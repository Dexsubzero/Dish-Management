<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $dish = Dish::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $dish->name,
                'price' => $dish->price,
                'image' => $dish->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('directory.cart')->with('success', 'Dish added to cart!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('directory.cart', compact('cart', 'total'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'discount' => 10.0,
            'total' => max($subtotal - 10.0, 0),
        ]);
    }

    public function checkout(Request $request)
    {
        if ($request->isMethod('post')) {
            $items = $request->input('items', []);

            // Update cart in session
            $cart = session()->get('cart', []);

            foreach ($items as $id => $data) {
                if (isset($cart[$id])) {
                    $quantity = max(1, (int) $data['quantity']); // ensure quantity >=1
                    $cart[$id]['quantity'] = $quantity;
                }
            }

            session(['cart' => $cart]);
        }

        $cart = session()->get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $discount = 10.0;
        $total = max(0, $subtotal - $discount);

        return view('directory.checkout', compact('cart', 'subtotal', 'discount', 'total'));
    }
}
