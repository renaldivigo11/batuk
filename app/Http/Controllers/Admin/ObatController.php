<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename='Data Obat';
        $data=obat::all();
        return view('admin.obat.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename='Form Input Data Obat';
        return view('admin.obat.create', compact('pagename'));
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
            'txtnama' => 'required',
            'txtharga' => 'required',
            'txtkomposisi' => 'required',
            'txtexpired' => 'required',
        ]);

        $data_obat = new obat([
            'nama_obat' => $request->get('txtnama'),
            'harga_obat' => $request->get('txtharga'),
            'komposisi_obat' => $request->get('txtkomposisi'),
            'expired_date' => $request->get('txtexpired'),
            ]);
            
        $data_obat->save();
        return redirect('admin/obat')->with('sukses', 'Data Obat berhasil disimpan');
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
        $pagename = 'Update Data Obat';
        $data = obat::find($id);
        return view('admin.obat.edit', compact('data', 'pagename'));
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
            'txtnama' => 'required',
            'txtharga' => 'required',
            'txtkomposisi' => 'required',
            'txtexpired' => 'required',
        ]);

        $obat = obat::find($id);

            $obat->nama_obat = $request->get('txtnama');
            $obat->harga_obat = $request->get('txtharga');
            $obat->komposisi_obat = $request->get('txtkomposisi');
            $obat->expired_date = $request->get('txtexpired');
            
        $obat->save();
        return redirect('admin/obat')->with('sukses', 'Data Obat berhasil diupdate');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = obat::find($id);
        $obat->delete();
        return redirect('admin/obat')->with('sukses', 'Data Obat berhasil dihapus');
    }
}
