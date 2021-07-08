@php
$ar_judul = ['No','Nama Guru','Nama Kelas','Nama Pengguna','Status'];
    $no = 1;
@endphp
    <h3 align="center">Data Pengguna</h3>
    <table align="center" border="1" cellpadding="5">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th align="center">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($ar_pengguna as $p)
                <tr>
                <td>{{ $no++ }}</td>
                    <td>{{ $p->nama_guru }}</td>
                    <td>{{ $p->kls }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>