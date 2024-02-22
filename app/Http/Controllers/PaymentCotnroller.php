<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PaymentCotnroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bayar(Request $request, string $id)
    {
        $request->validate([
            'id_siswi' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_bayar' => 'required',
        ]);

        $record = Pay::where('id_siswi', $request->id_siswi)->first();

        if ($record) {
            $data = [
                'id_siswi' => $request->id_siswi,
                'tanggal_bayar' => $request->tanggal_bayar,
                'jumlah_bayar' => $record->jumlah_bayar + $request->jumlah_bayar
            ];

            $record->update($data);
            
            return response()->json(['status' => 'success', 'message' => 'Data telah diperbarui']);

        }else {
            $dataT = [
                'id_siswi' => $request->id_siswi,
                'tanggal_bayar' => $request->tanggal_bayar,
                'jumlah_bayar' => $request->jumlah_bayar
            ];

            Pay::create($dataT);
            
            return response()->json(['status' => 'success', 'message' => 'Data telah ditambahkan']);
        }
    }

    public function index()
    {
        $pay = Pay::all();
        $siswa = Siswa::all();
        return view('pembayaran.index', compact('pay', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('pembayaran.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswi' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_bayar' => 'required',
        ]);

        $dataT = [
            'id_siswi' => $request->id_siswi,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar
        ];

        Pay::create($dataT);
        
        return response()->json(['status' => 'success', 'message' => 'Data telah ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pay = Pay::find($id);
        $siswa = Siswa::all();
        return view('pembayaran.show', compact('siswa', 'pay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pay = Pay::find($id);
        $siswa = Siswa::all();
        return view('pembayaran.edit', compact('siswa', 'pay'));
    }

    /**
     * Update the specified resource in storage.
     */
/**
 * Update the specified resource in storage.
 */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::find($request->id_siswi);
        if (!$siswa) {
            return response()->json('gaonk siswa');
        }

        $pay = Pay::find($id);
        if (!$pay) {
            return response()->json('gaonk data pay');
        }

        
        // Menghapus koma dari input jika ada
        $jumlah_bayar = str_replace(',', '', $request->jumlah);

        // Menghapus titik dari input jika ada
        $jumlah_bayar = str_replace('.', '', $jumlah_bayar);

        // Mengonversi string ke bentuk numerik
        $jumlah_bayar = (float) $jumlah_bayar;

        $pay->id_siswi = $siswa->id;
        $pay->jumlah_bayar = $jumlah_bayar;
        $pay->tanggal_bayar = $request->tanggal;
        $pay->save();

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
