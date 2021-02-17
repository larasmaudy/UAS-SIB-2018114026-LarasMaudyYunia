<?php

namespace App\Http\Controllers\Api;

use App\models\Presences;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presences = Presences::orderBy('id', 'desc')->paginate(20);

        return response()->json([
            'success' => true,
            'messege' => 'Daftar Data Absensi',
            'data'      => $presences
        ], 200);

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
            'waktu' => 'required|unique:presences|max:225',
            'mhs_id' => 'required',
            'mk_id' => 'required',
            'kehadiran' => 'required', 
        ]);

        $presences = Presences::create([
            'waktu' => $request->waktu,
            'mhs_id' => $request->mhs_id,
            'mk_id' => $request->mk_id,
            'kehadiran' => $request->kehadiran,
        ]);

        if($presences){
            return response()->json([
                'success' => true,
                'messege' => 'Data Absensi Berhasil Ditambahkan',
                'data'      => $presences
            ], 200);   
        }else{
            return response()->json([
            'success' => false,
            'messege' => 'Data Absensi Gagal Ditambahkan',
            'data'      => $presences
            ], 409);
        }

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
