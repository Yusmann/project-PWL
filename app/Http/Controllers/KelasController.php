<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Kelas;
use Symfony\Contracts\Service\Attribute\Required;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_kelas = DB::table('kelas')->get();
        
        return view('kelas.index',compact('ar_kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('kelas.form');
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
                'nama' => 'required',
                'kuota' => 'required|numeric',
            ],

            [
                'nama.required' => 'Nama Harus di Isi',
                'kuota.required' => 'Kuota Harus di Isi',
                'kuota.numeric' => 'Kuota Harus Berupa Angka',
            ]
        );

        //proses upload file
        //if (!empty($request->foto)) {
        //    $fileName = $request->p_nomor . '.' . $request->foto->extension();
        //    $request->foto->move(public_path('images/kelas'), $fileName);
        //} else {
        //    $fileName = '';
        //}

        //proses input data
        // 1. tangkap request form
        DB::table('kelas')->insert(
            [
                'nama' => $request->nama,
                'kuota' => $request->kuota,
            ]
        );

        //2. landing page
        return redirect('/kelas');
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
        $ar_kelas = DB::table('kelas')->where('kelas.id', $id)->get();

        return view('kelas.show', compact('ar_kelas'));
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
        $data = DB::table('kelas')->where('id', $id)->get();

        return view('kelas.form_edit', compact('data'));
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
        DB::table('kelas')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'kuota' => $request->kuota,
            ]
        );

        //2. landing page
        return redirect('/kelas'.'/'.$id);
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
        DB::table('kelas')->where('id', $id)->delete();

        //2. landing page
        return redirect('/kelas');
    }

    public function PDF()
    {
        $ar_kelas = DB::table('kelas')->get();

        $pdf = PDF::loadView('kelas.PDFku', ['ar_kelas' => $ar_kelas]);

        return $pdf->download('DataKelas.pdf');
    }
}