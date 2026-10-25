<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h5 class="card-title text-primary">Pelapor: {{ $laporan->nama_pelapor }}</h5>
        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $laporan->lokasi }}</h6>
        <p class="card-text mb-1"><strong>Tinggi Genangan:</strong> {{ $laporan->tinggi_genangan }} cm</p>
        <p class="card-text mb-1"><strong>Tanggal Kejadian:</strong> {{ $laporan->tanggal_kejadian }}</p>
        
        <p class="card-text mb-2">
            <strong>Status:</strong> 
            @if($laporan->tinggi_genangan < 30)
                <span class="badge bg-warning text-dark">Waspada (< 30 cm)</span>
            @elseif($laporan->tinggi_genangan >= 30 && $laporan->tinggi_genangan <= 70)
                <span class="badge bg-orange text-dark" style="background-color: #fd7e14; color: white;">Siaga (30 - 70 cm)</span>
            @else
                <span class="badge bg-danger">Awas (> 70 cm)</span>
            @endif
        </p>

        <p class="card-text text-secondary mb-0"><small><strong>Keterangan:</strong> {{ $laporan->keterangan }}</small></p>
    </div>
</div>