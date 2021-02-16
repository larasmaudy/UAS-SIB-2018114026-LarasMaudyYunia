<?php

namespace App\Http\Controllers;
use App\models\Semesters;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semesters::orderBy('id', 'desc')->paginate(10);

        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('semesters.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'semester' => 'required|unique:semesters|max:225',
        ]);

        $semester = new Semesters;

        $semester->Semester = $request->semester;
        $semester->save();
    }
    public function show($id)
    {
        $semesters = Semesters::where('id', $id)->first();
        return view('semesters.show', ['semesters' => $semesters]);
    }
    public function edit($id)
    {
        $semesters = Semesters::where('id', $id)->first();
        return view('semesters.edit', ['semesters' => $semesters]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|unique:semesters|max:225', 
        ]);

        $semesters = Semesters::find($id)->update([
            'semester' => $request->semester,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Semesters::find($id)->delete();
        return redirect ('/'); 
    }
}
 