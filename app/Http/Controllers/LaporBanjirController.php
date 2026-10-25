<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    // Menampilkan daftar laporan (Hanya bisa diakses petugas yang sudah login)
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    // Menampilkan form pelaporan (Bisa diakses umum oleh warga tanpa login)
    public function create()
    {
        return view('laporan.create');
    }

    // Menyimpan data laporan dari form ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tinggi_genangan' => 'required|integer',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Laporan::create($validated);

        // Setelah sukses menyimpan, arahkan kembali ke form dengan pesan sukses
        return redirect()->route('laporan.create')->with('success', 'Laporan banjir berhasil dikirimkan ke pihak BPBD!');
    }
}