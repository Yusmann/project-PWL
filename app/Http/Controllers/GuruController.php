<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Guru;
use Symfony\Contracts\Service\Attribute\Required;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_guru = DB::table('guru')->get();

        return view('guru.index', compact('ar_guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke form
        return view('guru.form');
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
                'umur' => 'required|numeric',
                'subject' => 'required',
                'status' => 'required',
            ],

            [
                'nama.required' => 'Nama Harus di Isi',
                'umur.required' => 'Umur Harus di Isi',
                'umur.numeric' => 'Umur Harus Berupa Angka',
                'subject.required' => 'Subject Harus di Isi',
                'status.required' => 'Status Harus di Isi',
            ]
        );


        //proses input data
        // 1. tangkap request form
        DB::table('guru')->insert(
            [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'subject' => $request->subject,
                'status' => $request->status,
            ]
        );

        //2. landing page
        return redirect('/guru');
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
        $ar_guru = DB::table('guru')->where('guru.id', $id)->get();

        return view('guru.show', compact('ar_guru'));
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
        $data = DB::table('guru')->where('id', $id)->get();

        return view('guru.form_edit', compact('data'));
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
        DB::table('guru')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'subject' => $request->subject,
                'status' => $request->status,
            ]
        );

        //2. landing page
        return redirect('/guru' . '/' . $id);
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
        DB::table('guru')->where('id', $id)->delete();

        //2. landing page
        return redirect('/guru');
    }

    public function PDF()
    {
        $ar_guru = DB::table('guru')->get();

        $pdf = PDF::loadView('guru.PDFku', ['ar_guru' => $ar_guru]);

        return $pdf->download('DataGuru.pdf');
    }
}