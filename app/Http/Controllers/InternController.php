<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $intern = Intern::all();
        return view('magang.intern.index', compact('intern'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $intern = Intern::all();
        return view('magang.intern.create', compact('intern'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $intern = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ];
        // dd($intern);
        Intern::create($intern);
        return view('magang.intern.index', compact('intern'));
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
        $intern = Intern::find($id);
        return view('magang.intern.edit', compact('intern'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $intern = Intern::find($id);
        $intern->nama = $request->nama;
        $intern->kelas = $request->kelas;
        $intern->update($request->all());
        // $intern = [
        //     'nama' => $request->nama,
        //     'kelas' => $request->kelas,
        // ];
        // Intern::update($intern);
        return redirect()->route('intern.index', compact('intern'));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $intern = Intern::find($id);
        $intern->delete();
        
        return redirect()->route('intern.index', compact('intern'));
    }
}
