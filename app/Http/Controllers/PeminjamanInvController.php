<?php

namespace App\Http\Controllers;

use App\Models\BarangInv;
use App\Models\PeminjamanInv;
use App\Models\SiswaInv;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanInvController extends Controller
{
    public function test2($id)
    {
        $data = PeminjamanInv::with(['siswa', 'barang'])->find($id);
        return $data;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswaInv = SiswaInv::all();
        $barang = BarangInv::all();
        $peminjaman = PeminjamanInv::all();
        return view('inventaris.inventaris', compact('siswaInv', 'barang', 'peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswaInv = SiswaInv::all();
        $barang = BarangInv::all();
        $peminjaman = PeminjamanInv::all();
        return view('inventaris.create', compact('siswaInv', 'barang', 'peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required|date',
            'deadline' => 'required|date|after:tgl_pinjam',
        ]);
    
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Jika validasi berhasil, simpan data
        $peminjaman = new PeminjamanInv();
        $peminjaman->id_siswa = $request->id_siswa;
        $peminjaman->id_barang = $request->id_barang;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->deadline = $request->deadline;
        $peminjaman->save();
    
        // Redirect ke halaman peminjaman.index
        return redirect()->route('peminjaman.index');
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
    public function update(Request $request)
    {
        $peminjamans = PeminjamanInv::all();
    
        foreach ($peminjamans as $peminjaman) {
            // Find the specific record by its ID
            $peminjamanToUpdate = PeminjamanInv::find($peminjaman->id);
    
            // Update tgl_kembali for the found record
            $peminjamanToUpdate->tgl_kembali = $request->tgl_kembali;
            $peminjamanToUpdate->save();
    
            // Now, check the status based on the updated tgl_kembali
            $deadline = Carbon::parse($peminjamanToUpdate->deadline);
            $tglKembali = Carbon::parse($request->tgl_kembali);
    
            // Check if tgl_kembali is within the deadline
            if ($tglKembali->lte($deadline)) {
                $peminjamanToUpdate->status = 'tepat waktu';
            } else {
                $peminjamanToUpdate->status = 'terlambat';
            }
    
            $peminjamanToUpdate->save();
        }
    
        return redirect()->route('peminjaman.index')->with('success', 'Status updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = PeminjamanInv::find($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'deleted successfully.');
    }
}
