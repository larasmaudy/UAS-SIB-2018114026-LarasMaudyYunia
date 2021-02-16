<?php

namespace App\Http\Controllers;
use App\models\Contracts;
use Illuminate\Http\Request;

class KontrakmkController extends Controller
{
    public function index()
    {
        $contract = Contracts::orderBy('id', 'desc')->paginate(10);

        return view('contracts.index', compact('contract'));
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'mhs_id' => 'required|unique:contracts|max:225',
            'smstr_id' => 'required',
        ]);


        $contract = new Contracts;

        $contract->Mahasiswa_id = $request->mhs_id;
        $contract->Semester_id = $request->smstr_id;
        $contract->save();
    }
    public function show($id)
    {
        $contract = Contracts::where('id', $id)->first();
        return view('contracts.show', ['contracts' => $contracts]);
    }
    public function edit($id)
    {
        $contract = Contracts::where('id', $id)->first();
        return view('contracts.edit', ['contracts' => $contracts]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'mhs_id' => 'required|unique:contract|max:225',
            'smstr_id' => 'required', 
        ]);

        $contract = Contracts::find($id)->update([
            'mhs_id' => $request->mhs_id,
            'smstr_id' => $request->smstr_id,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Contracts::find($id)->delete();
        return redirect ('/'); 
    }
}
