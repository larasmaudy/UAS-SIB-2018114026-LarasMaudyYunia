<?php

namespace App\Http\Controllers;
use App\models\Courses;
use Illuminate\Http\Request;

class MkController extends Controller
{
    public function index()
    {
        $course = Courses::orderBy('id', 'desc')->paginate(10);

        return view('courses.index', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([

            'kode' => 'required|unique:courses|max:225',
            'nama_mk' => 'required',
            'sks' => 'required',
        ]);


        $course = new Courses;

        $course->ID = $request->kode;
        $course->Nama_Mk = $request->nama_mk;
        $course->SKS = $request->sks;
        $courses->save();
    }
    public function show($id)
    {
        $course = Courses::where('id', $id)->first();
        return view('courses.show', ['courses' => $course]);
    }
    public function edit($id)
    {
        $course = Courses::where('id', $id)->first();
        return view('courses.edit', ['courses' => $course]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|unique:courses|max:225',
            'nama_mk' => 'required',
            'sks' => 'required', 
        ]);

        $course = Courses::find($id)->update([
            'kode' => $request->kode,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Courses::find($id)->delete();
        return redirect ('/'); 
    }
}
