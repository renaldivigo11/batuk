<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\batuk;
use App\pengguna;
use Illuminate\Http\Request;

class BatukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Batuk';
        $data=batuk::all();
        return view('admin.batuk.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_pengguna=pengguna::all();
        $pagename='Form Input Data Batuk';
        return view('admin.batuk.create', compact('pagename', 'data_pengguna'));
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
            'txttekanan' => 'required',
            'txtid_pengguna' => 'required',
            'txtwaktu' => 'required',
        ]);

        $data_batuk = new batuk([
            'tekanan_batuk' => $request->get('txttekanan'),
            'id_pengguna' => $request->get('txtid_pengguna'),
            'waktu_batuk' => $request->get('txtwaktu'),
            ]);
            
        $data_batuk->save();
        return redirect('admin/batuk')->with('sukses', 'Data Batuk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $pagename = 'Update Batuk';
        $data = batuk::find($id);
        return view('admin.batuk.edit', compact('data', 'pagename', 'data_pengguna'));
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
            'txttekanan' => 'required',
            'txtwaktu' => 'required',
        ]);

        $batuk = batuk::find($id);

            $batuk->tekanan_batuk = $request->get('txttekanan');
            $batuk->waktu_batuk = $request->get('txtwaktu');
            
        $batuk->save();
        return redirect('admin/batuk')->with('sukses', 'Data Batuk berhasil diupdate');    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batuk = batuk::find($id);
        $batuk->delete();
        return redirect('admin/batuk')->with('sukses', 'Data Batuk berhasil dihapus');
    }
}
