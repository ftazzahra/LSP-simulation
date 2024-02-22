<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\Intern;
use App\Models\Pkl;
use Illuminate\Http\Request;

class DatapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intern = Intern::all();
        $dudi = Dudi::all();
        $pkl = Pkl::all();
        return view('magang.datap', compact('pkl', 'intern', 'dudi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dudi = Dudi::all();
        $intern = Intern::all();
        return view('magang.create', compact('intern', 'dudi'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pkl = [
            'id_intern' => $request->intern,
            'id_dudi' => $request->nama_pt,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
        ];
        Pkl::create($pkl);
        return redirect()->route('data-pkl.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
