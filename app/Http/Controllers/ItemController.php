<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ItemController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer', // ← diganti jadi stock
        ]);
        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Barang ditambahkan!');
    }

    public function edit(Item $item)
    {
        $categories = \App\Models\Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer', // ← diganti jadi stock
        ]);
        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Barang diperbarui!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang dihapus!');
    }
}