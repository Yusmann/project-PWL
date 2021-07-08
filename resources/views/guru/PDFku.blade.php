@php
    $ar_judul = ['No','Nama','Umur','Subject','Status'];
    $no = 1;
@endphp
    <h3 align="center">Data Guru</h3>
    <table align="center" border="1" cellpadding="5">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th align="center">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($ar_guru as $g)
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->umur }}</td>
                <td>{{ $g->subject }}</td>
                <td>{{ $g->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>