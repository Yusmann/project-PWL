@extends('page.index')
@section('konten')
    <h3 class="mt-3">Detail Data Kelas</h3>
    @foreach ($ar_kelas as $k)
        <div class="card" style="width: 22rem;">
                <div class="card-body">
                <h5 class="card-title" style="font-size: 24px; font-weight: 600;">{{ $k->nama }}</h5>
                <p class="card-text">
                    Kuota: {{ $k->kuota }}
                </p>
                <a href="{{ url('/kelas') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection