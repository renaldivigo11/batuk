<?php

namespace App\Http\Controllers\API\Batuk;

use App\Http\Controllers\Controller;
use App\batuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatukController extends Controller
{
    public function getAll(){
        $data=DB::table('batuks')
        ->orderBy('id', 'desc')
        ->get();

        return response()->json($data, 200);
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'id' => 'required',
            'id_pengguna' => 'required',
            'tekanan_batuk' => 'required',
            'waktu_batuk' => 'required',
        ]);

        $data = new batuk;
        $data->id = $request->id;
        $data->id_pengguna = $request->id_pengguna;
        $data->tekanan_batuk = $request->tekanan_batuk;
        $data->waktu_batuk = $request->waktu_batuk;
        $data->save();

        return response()->json($data, 201);
    }

    public function update(Request $request){
        $validateData=$request->validate([
            'id' => 'required',
            'id_pengguna' => 'required',
            'tekanan_batuk' => 'required',
            'waktu_batuk' => 'required',
        ]);

        $data = batuk::where('id', '=',$request->id)->first();
        $data->id = $request->id;
        $data->id_pengguna = $request->id_pengguna;
        $data->tekanan_batuk = $request->tekanan_batuk;
        $data->waktu_batuk = $request->waktu_batuk;
        $data->save();

        return response()->json($data, 201);
    }

    public function destroy(Request $request){
        $data = batuk::where('id', '=',$request->id)->first();

        if(!empty($data)){
            $data->delete();

            return response()->json($data, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan',
            ], 400);
        }

    }
}
