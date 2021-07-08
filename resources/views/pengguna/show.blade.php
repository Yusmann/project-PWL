@extends('page.index')
@section('konten')
    <h3 class="mt-3">Detail Data Pengguna</h3>
    @foreach ($ar_pengguna as $p)
        <div class="card" style="width: 22rem;">
            @php
            if(!empty($p->foto)) {
            @endphp
                <img src="{{ asset('images/pengguna')}}/{{ $p->foto }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h5 class="card-title" style="font-size: 24px; font-weight: 600;">{{ $p->nama }}</h5>
                <p class="card-text">
                    Nama Guru : {{ $p->nama_guru }}
                    <br/>Nama Kelas : {{ $p->kls }}
                    <br/>Status : {{ $p->status }}
                </p>
                <a href="{{ url('/pengguna') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection