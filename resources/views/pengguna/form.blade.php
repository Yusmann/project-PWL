@extends('page.index')
@section('konten')
@php
    $rs1 = App\Models\Guru::all();
    $rs2 = App\Models\Kelas::all();
@endphp
    <h3 class="mt-3">Form Pengguna</h3>
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
    <form method="POST" action="{{ route('pengguna.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Guru :</label>
            <select class="form-control @error('idguru') is-invalid @enderror" name="idguru" />
            <option value="">-- Pilih Guru --</option>
            @foreach ($rs1 as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
            </select>
            @error('idguru')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Kelas :</label>
            <select class="form-control @error('idkelas') is-invalid @enderror" name="idkelas" />
            <option value="">-- Pilih Kelas --</option>
            @foreach ($rs2 as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
            </select>
            @error('idkelas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Nama Pengguna :</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Status :</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"/>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto Pengguna :</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"/>
                </div>
            </div>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-danger" name="proses">Hapus</button>
    </form>
@endsection