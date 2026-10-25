@extends('layouts.app')

@section('title', 'Form Pelaporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulir Pelaporan Banjir</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Gunakan formulir ini untuk melaporkan kejadian banjir di wilayah Kabupaten Bandung secara cepat kepada petugas BPBD.</p>
                
                <form action="{{ route('laporan.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama_pelapor" class="form-label">Nama Pelapor:</label>
                        <input type="text" class="form-control @error('nama_pelapor') is-invalid @enderror" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required placeholder="Masukkan nama lengkap Anda">
                        @error('nama_pelapor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Kejadian:</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required placeholder="Contoh: Dayeuhkolot, Kab. Bandung">
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tinggi_genangan" class="form-label">Tinggi Genangan Air (cm):</label>
                        <input type="number" class="form-control @error('tinggi_genangan') is-invalid @enderror" id="tinggi_genangan" name="tinggi_genangan" value="{{ old('tinggi_genangan') }}" required placeholder="Contoh: 50">
                        @error('tinggi_genangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian:</label>
                        <input type="date" class="form-control @error('tanggal_kejadian') is-invalid @enderror" id="tanggal_kejadian" name="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}" required>
                        @error('tanggal_kejadian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan / Kondisi Terkini:</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" placeholder="Jelaskan kondisi di lokasi secara singkat...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection