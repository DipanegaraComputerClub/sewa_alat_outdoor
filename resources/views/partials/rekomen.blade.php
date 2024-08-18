<div class="container">
    <h4>Rekomendasi Alat Outdoor</h4>
    @if(count($rekomenAlat) > 0)
        <ul>
            @foreach($rekomenAlat as $alat)
                <li>{{ $alat->nama_alat}} | Rating : {{ $alat->rating }}</li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada rekomendasi alat saat ini.</p>
    @endif
</div>