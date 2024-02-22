<?php

namespace App\Http\Controllers;

use App\Models\BarangInv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangInvController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $barangInv = BarangInv::latest()->paginate(5);
        return view('inventaris.barangInv.index', compact('barangInv'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.barangInv.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'     => 'required|min:5',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/barang', $image->hashName());

        //create post
        BarangInv::create([
            'gambar'     => $image->hashName(),
            'nama_barang'     => $request->nama_barang,
        ]);
        // return response()->json('store success');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $barangInv = barangInv::find($id);
        // echo '<pre>';
        // print_r($barangInv);die;
        // echo '</pre>';
        return view('inventaris.barangInv.edit', compact('barangInv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangInv $barang)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'     => 'required|min:5',
        ]);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/barang', $image->hashName());

            //delete old image
            Storage::delete('public/barang/'.$barang->gambar);

            //update post with new image
            $barang->update([
                'gambar'     => $image->hashName(),
                'nama_barang'     => $request->nama_barang,
            ]);

        } else {

            //update post without image
            $barang->update([
                'nama_barang'     => $request->nama_barang,
            ]);
        }
       
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangInv = barangInv::find($id);

        $barangInv->barang()->update(['id_barang' => null]);

        $barangInv->delete();

        return redirect()->route('barang.index');
    }
}
