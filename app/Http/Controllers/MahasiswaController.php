<?php

namespace App\Http\Controllers;
use App\models\Students;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $student = Students::orderBy('id', 'desc')->paginate(10);

        return view('students.index', compact('student'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'nim' => 'required|unique:students|max:225',
            'nama_mhs' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required', 
        ]);


        $student = new Students;

        $student->NIM = $request->nim;
        $student->Nama_Mahasiswa = $request->nama_mhs;
        $student->Alamat = $request->alamat;
        $student->No_Tlp = $request->notlp;
        $student->Email= $request->email;
        $student->save();
    }
    public function show($id)
    {
        $student = Students::where('id', $id)->first();
        return view('students.show', ['students' => $student]);
    }
    public function edit($id)
    {
        $student = Students::where('id', $id)->first();
        return view('students.edit', ['students' => $student]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:students|max:225',
            'nama_mhs' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required', 
        ]);

        Students::find($id)->update([
            'nim' => $request->nim,
            'nama_mhs' => $request->nama_mhs,
            'alamat' => $request->alamat,
            'notlp' => $request->notlp,
            'email' => $request->email,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Students::find($id)->delete();
        return redirect ('/'); 
    }
}
