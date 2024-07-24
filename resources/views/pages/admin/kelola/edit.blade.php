
@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="jml_halaman">Jumlah Halaman</label>
            <input type="number" id="jml_halaman" name="jml_halaman" class="form-control" value="{{ old('jml_halaman', $buku->jml_halaman) }}" required>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun Terbit</label>
            <input type="number" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', $buku->tahun) }}" required>
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}" required>
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}" required>
        </div>

        <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea id="desc" name="desc" class="form-control">{{ old('desc', $buku->desc) }}</textarea>
        </div>

        <div class="form-group">
            <label for="img">Gambar</label>
            <input type="file" id="img" name="img" class="form-control">
            @if ($buku->img)
                <img src="{{ asset('images/' . $buku->img) }}" alt="{{ $buku->judul }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>
</div>