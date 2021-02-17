<?php

namespace App\Http\Controllers;
use App\models\Presences;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $presence = Presences::orderBy('id', 'desc')->paginate(19);

        return view('presences.index', compact('presence'));
    }

    public function create()
    {
        return view('presences.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'waktu' => 'required|unique:presences|max:225',
            'mhs_id' => 'required',
            'mk_id' => 'required',
            'kehadiran' => 'required', 
        ]);


        $presences = new Presences;

        $presence->Waktu = $request->waktu;
        $presence->ID_Mahasiswa = $request->mhs_id;
        $presence->ID_Mata_Kuliah = $request->mk_id;
        $presence->Kehadiran= $request->kehadiran;
        $presence->save();
    }
    public function show($id)
    {
        $presence = Presences::where('id', $id)->first();
        return view('presences.show', ['presences' => $presence]);
    }
    public function edit($id)
    {
        $presence = Presences::where('id', $id)->first();
        return view('presences.edit', ['presences' => $presence]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'waktu' => 'required|unique:presences|max:225',
            'mhs_id' => 'required',
            'mk_id' => 'required',
            'kehadiran' => 'required',   
        ]);

        Presences::find($id)->update([
            'waktu' => $request->waktu,
            'mhs_id' => $request->mhs_id,
            'mk_id' => $request->mk_id,
            'kehadiran' => $request->kehadiran,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Presences::find($id)->delete();
        return redirect ('/'); 
    }
}
