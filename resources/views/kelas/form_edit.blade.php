@extends('page.index')
@section('konten')
    <h3 class="mt-3">Form Edit Kelas</h3>
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
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('kelas.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" placeholder="isi nama kelas" value="{{ $rs->nama }}" class="form-control @error('nama') is-invalid @enderror" maxlength="25"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Kuota :</label>
            <input type="number" name="kuota" placeholder="isi kuota kelas" value="{{ $rs->kuota }}" class="form-control @error('kuota') is-invalid @enderror" min="1" max="100"/>
            @error('kuota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/kuota') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection