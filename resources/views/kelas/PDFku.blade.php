@php
    $ar_judul = ['No','Nama','Kuota']; 
    $no = 1;
@endphp
    <h3 align="center">Data Kelas</h3>
    <table align="center" border="1" cellpadding="5">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th align="center">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($ar_kelas as $k)
                <tr>
                <td>{{ $no++ }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->kuota }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>