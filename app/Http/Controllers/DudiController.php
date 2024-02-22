<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dudi = Dudi::all();
        return view('magang.dudi.index', compact('dudi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dudi = Dudi::all();
        return view('magang.dudi.create', compact('dudi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dudi = [
            'nama_pt' => $request->nama_pt,
            'alamat' => $request->alamat,
        ];
        Dudi::create($dudi);
        return redirect()->route('dudi.index');
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
    public function edit(string $id)
    {
        $dudi = Dudi::find($id);
        return view('magang.dudi.edit', compact('dudi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dudi = Dudi::find($id);
        $dudi->nama_pt = $request->nama_pt;
        $dudi->alamat = $request->alamat;
        $dudi->update($request->all());
        return redirect()->route('dudi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dudi = Dudi::find($id);
        $dudi->delete();
        return redirect()->route('dudi.index');
    }
}
