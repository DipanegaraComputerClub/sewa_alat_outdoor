@extends('admin.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manajemen Sub Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tambah Sub Kategori
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('subkategori.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="nama_subkategori" class="form-control" placeholder="Nama Sub Kategori Baru" required>
                            </div>
                            <select name="kategori_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select><br>
                            <button type="submit" name="tambah" class="btn btn-primary d-flex fa-pull-right">Tambah</button></a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Sub Kategori
                    </div>
                    <div class="card-body">
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sub Kategori</th>
                                    <th>Id Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $cat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cat->nama_subkategori }}</td>
                                    <td> {{ $cat->kategori_id }}</td>
                                    <td>
                                        <a href="{{ route('subkategori.edit',['id'=>$cat->id]) }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('subkategori.destroy',['id'=>$cat->id]) }}" method="POST" style="display: inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="javascript: return confirm('Anda yakin akan menghapus alat ini?');"><i class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection