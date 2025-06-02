<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Mail\OrderConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReminderEmail;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'subtotal' => 'required|numeric',
                'discount' => 'required|numeric',
                'total' => 'required|numeric',
                'items' => 'required|string',
            ]);

            $orders = Order::create([
                'user_id' => Auth::id(),
                'name' => $validated['name'],
                'address' => $validated['address'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'items' => $validated['items'],
                'subtotal' => $validated['subtotal'],
                'discount' => $validated['discount'],
                'total' => $validated['total'],
                'status' => 'Pending',
            ]);

            if ($orders->email) {
                // Send immediate confirmation email
                Mail::to($orders->email)->send(new OrderConfirmationEmail($orders->name, $orders->total));

                // Dispatch the reminder email with 2 minutes delay
                Mail::to($orders->email)->later(now()->addMinutes(2), new OrderReminderEmail($orders->name, $orders->total));
            }

            return redirect()
                ->route('dashboard.home', ['id' => Auth::id()])
                ->with('success', 'Order placed successfully!');
        } catch (Exception $e) {
            Log::error('Order creation failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'An error occurred while placing the order. Please try again.');
        }
    }

    public function managerOrders()
    {
        try {
            $orders = Order::latest()->get();
            return view('orders.index', compact('orders'));
        } catch (Exception $e) {
            Log::error('Fetching manager orders failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load manager orders.');
        }
    }

    public function userPurchase($id)
    {
        try {
            if ($id != Auth::id()) {
                abort(403, 'Unauthorized access to purchase history.');
            }

            $orders = Order::where('user_id', $id)->latest()->get();

            foreach ($orders as $order) {
                $order->items = json_decode($order->items, true);
            }

            return view('dashboard.home', compact('orders'));
        } catch (Exception $e) {
            Log::error('Fetching user purchases failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load your purchases.');
        }
    }
}
