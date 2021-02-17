<?php

namespace App\Http\Controllers\Api;

use App\models\Students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::orderBy('id', 'desc')->paginate(20);

        return response()->json([
            'success' => true,
            'messege' => 'Daftar Data Mahasiswa',
            'data'      => $students
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
            'nim' => 'required|unique:students|max:225',
            'nama_mhs' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required', 
        ]);

        $students = Students::create([
            'nim' => $request->nim,
            'nama_mhs' => $request->nama_mhs,
            'alamat' => $request->alamat,
            'notlp' => $request->notlp,
            'email' => $request->email, 
        ]);

        if($students){
            return response()->json([
                'success' => true,
                'messege' => 'Data Mahasiswa Berhasil Ditambahkan',
                'data'      => $students
            ], 200);   
        }else{
            return response()->json([
            'success' => false,
            'messege' => 'Data Mahasiswa Gagal Ditambahkan',
            'data'      => $students
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
        return response()->json([
            'success' => true,
            'messege' => 'Detail Data Mahasiswa',
            'data'      => $students
        ], 200);
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
            'nim' => 'required|unique:students|max:225',
            'nama_mhs' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required', 
        ]);

        $students = Students::create([
            'nim' => $request->nim,
            'nama_mhs' => $request->nama_mhs,
            'alamat' => $request->alamat,
            'notlp' => $request->notlp,
            'email' => $request->email, 
        ]);

        return response()->json([
            'success' => true,
            'messege' => 'Post Update',
            'data'      => $students
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Students::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
