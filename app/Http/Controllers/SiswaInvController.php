<?php

namespace App\Http\Controllers;

use App\Models\SiswaInv;
use Illuminate\Http\Request;

class SiswaInvController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        $siswaInv = SiswaInv::latest()->paginate(5);
        return view('inventaris.SiswaInv.index', compact('siswaInv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.SiswaInv.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $SiswaInv = new SiswaInv();
        $SiswaInv->nama = $request->nama;
        $SiswaInv->kelas = $request->kelas;
        $SiswaInv->save();

        // return response()->json('store success');
        return redirect()->route('siswaInven.index');
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
        $SiswaInv = SiswaInv::find($id);
        // echo '<pre>';
        // print_r($SiswaInv);die;
        // echo '</pre>';
        return view('inventaris.SiswaInv.edit', compact('SiswaInv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $SiswaInv = SiswaInv::find($id);
        $SiswaInv->nama = $request->nama;
        $SiswaInv->kelas = $request->kelas;

        $SiswaInv->update($request->all());

       
        return redirect()->route('siswaInven.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $SiswaInv = SiswaInv::find($id);

        $SiswaInv->peminjaman()->update(['id_siswa' => null]);

        $SiswaInv->delete();

        return redirect()->route('siswaInven.index');
    }
}
