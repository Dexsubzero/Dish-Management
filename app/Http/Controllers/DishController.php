<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Dish;
use App\Imports\DishesImport;
use App\Exports\DishesExport;
use Maatwebsite\Excel\Facades\Excel;



class DishController extends Controller
{
    public function index(): View
    {
        $dishes = Dish::all();
        return view('dishes.index')->with('dishes', $dishes);
    }

    public function create(): View
    {
        return view('dishes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Store uploaded image in storage/app/public/dishes
        $imagePath = $request->file('image')->store('dishes', 'public');
        $validated['image'] = $imagePath;

        Dish::create($validated);

        return redirect('dishes')->with('flash_message', 'Dish Added!');
    }

    public function show(string $id): View
    {
        $dish = Dish::findOrFail($id);
        return view('dishes.show')->with('dish', $dish);
    }

    public function edit(string $id): View
    {
        $dish = Dish::findOrFail($id);
        return view('dishes.edit')->with('dish', $dish);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $dish = Dish::findOrFail($id);

        if ($request->hasFile('image')) {
            // Store new image if uploaded
            $imagePath = $request->file('image')->store('dishes', 'public');
            $validated['image'] = $imagePath;
        } else {
            // Keep the old image if no new image is uploaded
            $validated['image'] = $dish->image;
        }

        $dish->update($validated);

        return redirect('dishes')->with('flash_message', 'Dish Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Dish::destroy($id);
        return redirect('dishes')->with('flash_message', 'Dish Deleted!');
    }
    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv'
    ]);

    Excel::import(new DishesImport, $request->file('file'));

    return back()->with('success', 'Dishes imported successfully!');
}

public function export()
{
    return Excel::download(new DishesExport, 'dishes.xlsx');
}
}
