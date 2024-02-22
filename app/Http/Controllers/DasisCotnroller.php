<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DasisCotnroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil()
    {
        $sis = Siswa::latest()->paginate(5);
        return view('siswa.index', compact('sis'));
    }
    
    public function index()
    {
        $sis = Siswa::latest()->paginate(5);
        return view('siswa.index', compact('sis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->save();

        // return response()->json('store success');
        return redirect()->route('data-siswa.index');
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
        $siswa = Siswa::find($id);
        // echo '<pre>';
        // print_r($siswa);die;
        // echo '</pre>';
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;

        $siswa->update($request->all());

       
        return redirect()->route('data-siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);

        $siswa->pay()->update(['id_siswi' => null]);

        $siswa->delete();

        return redirect()->route('data-siswa.index');
    }
}
