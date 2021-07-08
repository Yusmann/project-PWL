<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Pengguna;
use Symfony\Contracts\Service\Attribute\Required;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_pengguna = DB::table('pengguna')
            ->join('kelas', 'kelas.id', '=', 'pengguna.idkelas')
            ->join('guru', 'guru.id', '=', 'pengguna.idguru')
            ->select('pengguna.*', 'kelas.nama AS kls', 'guru.nama AS nama_guru')
            ->get();

        return view('pengguna.index', compact('ar_pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('pengguna.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validated = $request->validate(
            [
                'idkelas' => 'required|numeric',
                'idguru' => 'required|numeric',
                'nama' => 'required',
                'status' => 'required',
                'foto' => 'image|mimes:jpg,png,jpeg,gif|max:2000',
            ],

            [
                'idkelas.required' => 'Nama Kelas Harus dipilih',
                'idkelas.numeric' => 'Kelas Harus berupa angka',
                'idguru.required' => 'Nama Guru Harus dipilih',
                'idguru.numeric' => 'Guru Harus berupa angka',
                'nama.required' => 'Nama Harus dipilih',
                'status.required' => 'Status Harus di Isi',
                'foto.image' => 'File Harus Format jpg,jpeg,png,gif',
                'foto.max' => 'Ukuran File Maksimal 2mb',
            ]
        );

        //proses upload file
        if (!empty($request->foto)) {
            $fileName = $request->nama . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/pengguna'), $fileName);
        } else {
            $fileName = '';
        }

        //proses input data
        // 1. tangkap request form
        DB::table('pengguna')->insert(
            [
                'idkelas' => $request->idkelas,
                'idguru' => $request->idguru,
                'nama' => $request->nama,
                'status' => $request->status,
                'foto' => $fileName,
            ]
        );

        //2. landing page
        return redirect('/pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail
        $ar_pengguna = DB::table('pengguna')
            ->join('kelas', 'kelas.id', '=', 'pengguna.idkelas')
            ->join('guru', 'guru.id', '=', 'pengguna.idguru')
            ->select('pengguna.*', 'kelas.nama AS kls', 'guru.nama AS nama_guru')
            ->where('pengguna.id', $id)->get();

        return view('pengguna.show', compact('ar_pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan ke halaman form edit
        $data = DB::table('pengguna')->where('id', $id)->get();

        return view('pengguna.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        //mengedit data
        // 1. proses ubah data
        DB::table('pengguna')->where('id', $id)->update(
            [
                'idkelas' => $request->idkelas,
                'idguru' => $request->idguru,
                'nama' => $request->nama,
                'status' => $request->status,
                'foto' => $request->$foto,
            ]
        );

        //2. landing page
        return redirect('/pengguna' . '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        //1. hapus data
        DB::table('pengguna')->where('id', $id)->delete();

        //2. landing page
        return redirect('/pengguna');
    }

    public function PDF()
    {
        $ar_pengguna = DB::table('pengguna')
            ->join('kelas', 'kelas.id', '=', 'pengguna.idkelas')
            ->join('guru', 'guru.id', '=', 'pengguna.idguru')
            ->select('pengguna.*', 'kelas.nama AS kls', 'guru.nama AS nama_guru')
            ->get();

        $pdf = PDF::loadView('pengguna.PDFku', ['ar_pengguna' => $ar_pengguna]);

        return $pdf->download('DataPengguna.pdf');
    }
}