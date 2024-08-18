<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Beri Rating Alat Outdoor</div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('user-ratings.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="alat_id">Pilih Alat Outdoor:</label>
                        <select class="form-control" id="alat_id" name="alat_id">
                            @foreach($userRating as $v)
                                <option value="{{ $v->id }}">{{ $v->nama_alat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="rating">Input Nama Alat Outdor</label>
                        <input type="text" class="form-control" name="nama_alat">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Rating</button>
                </form>
            </div>
        </div>
    </div>
</div>