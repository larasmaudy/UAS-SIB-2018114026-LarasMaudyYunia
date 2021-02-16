<?php

namespace App\Http\Controllers;
use App\models\Schedules;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $schedule = Schedules::orderBy('id', 'desc')->paginate(10);

        return view('schedules.index', compact('schedule'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'jadwal' => 'required|unique:schedules|max:225',
            'mk_id' => 'required',
        ]);


        $schedule = new Schedules;

        $schedule->Jadwal = $request->jadwal;
        $schedule->MK_id = $request->mk_id;
        $schedule->save();
    }
    public function show($id)
    {
        $schedule = Schedules::where('id', $id)->first();
        return view('schedules.show', ['schedules' => $schedules]);
    }
    public function edit($id)
    {
        $schedule = Schedules::where('id', $id)->first();
        return view('schedules.edit', ['schedules' => $schedule]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'jadwal' => 'required|unique:schedules|max:225',
            'mk_id' => 'required',  
        ]);

        $schedules = Schedules::find($id)->update([
            'jadwal' => $request->jadwal,
            'mk_id' => $request->mk_id,
        ]);

        return redirect ('/');
    }
    public function destory($id)
    {
        Sschedules::find($id)->delete();
        return redirect ('/'); 
    }
}
