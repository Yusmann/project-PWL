@extends('page.index')
@section('konten')
    <h3 class="mt-3">Form Edit Guru</h3>
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
        <form method="POST" action="{{ route('guru.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" placeholder="isi nama guru" value="{{ $rs->nama }}" class="form-control @error('nama') is-invalid @enderror" maxlength="45"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Umur :</label>
            <input type="number" name="umur" placeholder="isi umur guru" value="{{ $rs->umur }}" class="form-control @error('umur') is-invalid @enderror" min="20" max="50"/>
            @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Subject :</label>
            <input type="text" name="subject" placeholder="isi subject(pelajaran)" value="{{ $rs->subject }}" class="form-control @error('subject') is-invalid @enderror" maxlength="4"/>
            @error('subject')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Status :</label>
            <input type="text" name="status" placeholder="isi status" value="{{ $rs->status }}" class="form-control @error('status') is-invalid @enderror" maxlength="11"/>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/guru') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection