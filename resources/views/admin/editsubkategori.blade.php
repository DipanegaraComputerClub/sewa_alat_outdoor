@extends('admin.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <a href="{{ route('subkategori.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
        <h1 class="mt-4 mb-4">Edit Sub Kategori "{{ $subcategories->nama_subkategori }}"</h1>
        <div class="row">
            <form action="{{ route('subkategori.update',['id'=>$subcategories->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <input type="text" name="nama_subkategori" class="form-control mb-4" width="30%" value="{{ $subcategories->nama_subkategori }}" required>
                <button type="submit" class="btn btn-primary">Ganti Nama</button>
            </form>
        </div>
    </div>
</main>
@endsection
