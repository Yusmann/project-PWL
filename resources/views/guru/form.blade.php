@extends('page.index')
@section('konten')
    <h3 class="mt-3">Form Guru</h3>
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
    <form method="POST" action="{{ route('guru.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" placeholder="isi nama guru" class="form-control @error('nama') is-invalid @enderror" maxlength="45"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Umur :</label>
            <input type="number" name="umur" placeholder="isi umur guru" class="form-control @error('umur') is-invalid @enderror" min="20" max="50"/>
            @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Subject :</label>
            <input type="text" name="subject" placeholder="isi subject(pelajaran)" class="form-control @error('subject') is-invalid @enderror" maxlength="50"/>
            @error('subject')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Status :</label>
            <input type="text" name="status" placeholder="isi status" class="form-control @error('status') is-invalid @enderror" maxlength="11"/>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-danger" name="proses">Hapus</button>
    </form>
@endsection