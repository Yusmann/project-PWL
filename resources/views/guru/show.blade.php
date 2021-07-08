@extends('page.index')
@section('konten')
    <h3 class="mt-3">Detail Data Guru</h3>
    @foreach ($ar_guru as $g)
        <div class="card" style="width: 22rem;">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 24px; font-weight: 600;">{{ $g->nama }}</h5>
                <p class="card-text">
                    Umur Guru : {{ $g->umur }}
                    <br/>Subject: {{ $g->subject }}
                    <br/>Status : {{ $g->status }}
                </p>
                <a href="{{ url('/guru') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection