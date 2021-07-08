@extends('page.index')
@section('konten')
    <h3 class="mt-3">Form Kelas</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" placeholder="isi nama kelas" class="form-control @error('nama') is-invalid @enderror" maxlength="25"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Kuota :</label>
            <input type="number" name="kuota" placeholder="isi kuota kelas" class="form-control @error('kuota') is-invalid @enderror" max="100"/>
            @error('kuota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-danger" name="proses">Hapus</button>
    </form>
@endsection