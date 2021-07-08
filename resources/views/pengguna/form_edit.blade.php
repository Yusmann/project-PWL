@extends('page.index')
@section('konten')
@php
    $rs1 = App\Models\Guru::all();
    $rs2 = App\Models\Kelas::all();
@endphp
    <h3 class="mt-3">Form Edit Pengguna</h3>
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
        <form method="POST" action="{{ route('pengguna.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Guru :</label>
                <select class="form-control @error('idguru') is-invalid @enderror" name="idguru" />
                <option value="">-- Pilih Guru --</option>
                @foreach ($rs1 as $g)
                @php
                    $sel1 = ($g->id == $rs->idguru) ? 'selected' : '';
                @endphp
                    <option value="{{ $g->id }}" {{ $sel1 }}>{{ $g->nama }}</option>
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
                @php
                    $sel2 = ($k->id == $rs->idkelas) ? 'selected' : '';
                @endphp
                    <option value="{{ $k->id }}" {{ $sel1 }}>{{ $k->nama }}</option>
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
            <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control @error('nama') is-invalid @enderror"/>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Status :</label>
            <input type="text" name="status" value="{{ $rs->status }}" class="form-control @error('status') is-invalid @enderror"/>
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
                    <input type="file" name="foto" value="{{ $rs->foto }}" class="form-control @error('foto') is-invalid @enderror"/>
                </div>
            </div>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/pengguna') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection