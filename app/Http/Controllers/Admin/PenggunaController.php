<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Tabel Pengguna';
        $data=pengguna::all();
        return view('admin.pengguna.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_pengguna=pengguna::all();
        $pagename='Form Input Pengguna';
        return view('admin.pengguna.create', compact('pagename','data_pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtnama_pengguna' => 'required',
            'txtumur_pengguna' => 'required',
        ]);

        $data_pengguna = new pengguna([
            'nama_pengguna' => $request->get('txtnama_pengguna'),
            'umur_pengguna' => $request->get('txtumur_pengguna'),
            ]);
            
        $data_pengguna->save();
        return redirect('admin/pengguna')->with('sukses', 'tugas berhasil disimpan');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pengguna = pengguna::all();
        $pagename = 'Update pengguna';
        $data = pengguna::find($id);
        return view('admin.pengguna.edit', compact('data', 'pagename', 'data_pengguna'));
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
        $request->validate([
            'txtnama_pengguna' => 'required',
            'txtumur_pengguna' => 'required',
        ]);

        $pengguna = pengguna::find($id);

            $pengguna->nama_pengguna = $request->get('txtnama_pengguna');
            $pengguna->umur_pengguna = $request->get('txtumur_pengguna');
            
        $pengguna->save();
        return redirect('admin/pengguna')->with('sukses', 'Pengguna berhasil diupdate');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = pengguna::find($id);
        $pengguna->delete();
        return redirect('admin/pengguna')->with('sukses', 'Kategori berhasil dihapus'); 
    }
}
