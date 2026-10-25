@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Rekapitulasi Daftar Laporan Banjir</h2>
            <span class="badge bg-secondary">Total Laporan: {{ count($laporan) }}</span>
        </div>
        <p class="text-muted">Halaman ini bersifat rahasia dan hanya dapat diakses oleh petugas BPBD yang terotentikasi[cite: 57].</p>
        <hr class="mb-4">

        @forelse($laporan as $laporan)
            @include('partials.laporan-card', ['laporan' => $laporan])
        @empty
            <div class="alert alert-info text-center" role="alert">
                Belum ada data laporan banjir yang masuk ke dalam database.
            </div>
        @endforelse
    </div>
</div>
@endsection