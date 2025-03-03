<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all(); // Mengambil semua data yang ada di Item
        return view ('items.index', compact('items')); // Menampilkan view yang ada di items.index dengan data-data items
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create'); // Menampilkan view yang ada di items.create untuk membuat data-data baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]); // Mensetting agar input name dan description harus diisi
        
        //Item :: create($request->all());
        //return redirect()->route('items.index');
        
        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description'])); // Menyimpan data ke databse
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // Untuk memunculkan Notifikasi ketika data berhasil ditambahkan
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Menampilkan view yang ada di items.show dengan data-data items
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Menampilkan view yang ada di items.edit untuk edit data item tertentu
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]); // Mensetting agar input name dan description harus diisi
            
        //$item->update($request->all());
        //return redirect()->route('items.index');
        // Hanya masukkan atribut yang diizinkan
        $item->update($request->only(['name', 'description'])); // Mengupdate data item ke dalam database
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Untuk memunculkan Notifikasi ketika data berhasil ditambahkan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item -> delete(); // Menghapus data item yang ada di databse
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Untuk memunculkan Notifikasi ketika data berhasil ditambahkan
    }
}
