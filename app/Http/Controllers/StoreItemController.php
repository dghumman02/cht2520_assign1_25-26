<?php

namespace App\Http\Controllers;

use App\Models\StoreItem;
use Illuminate\Http\Request;

class StoreItemController extends Controller
{
    // Public storefront
    public function publicIndex()
    {
        $items = StoreItem::where('is_active', true)->paginate(6);
        return view('store.index', compact('items'));
    }

    // Admin dashboard
    public function adminIndex(Request $request)
    {
        $query = StoreItem::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $items = $query->paginate(8);
        return view('admin.index', compact('items'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category' => 'required|max:100'
        ]);

        StoreItem::create($request->all());

        return redirect('/admin')->with('success', 'Product added successfully.');
    }

    public function edit(StoreItem $item)
    {
        return view('admin.edit', compact('item'));
    }

    public function update(Request $request, StoreItem $item)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category' => 'required|max:100'
        ]);

        $item->update($request->all());

        return redirect('/admin')->with('success', 'Product updated.');
    }

    public function destroy(StoreItem $item)
    {
        $item->delete();
        return redirect('/admin')->with('success', 'Product deleted.');
    }
}
