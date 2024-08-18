@extends('member.main')
@section('container')
<div class="container">
   <h2>Rekomendasi Alat Outdoor</h2>
    <div class="card shadow">
        <div class="card-body">
            @include('partials.rekomen')
        </div>
    </div>
</div>
@endsection