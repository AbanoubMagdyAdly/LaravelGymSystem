<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingSession;
use App\Gym;
use App\AttendanceUser;

class TrainingSessionController extends Controller
{
    public function index()
    {
        return datatables()->of(TrainingSession::query())->toJson();
    }

    public function index_view()
    {
        return view(
            'trainingsession.data'
        );
    }
    public function create()
    {
        $gyms = Gym::all();
        return view('trainingsession.create', [
            'gyms' => $gyms
        ]);
    }

    public function store(Request $request)
    {
        TrainingSession::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'start_time' => $request['start_time'],
            'finish_time' => $request['finish_time'],
            'date_of_session' => $request['date_of_session'],
            'gym_id' => $request['gym_id'],

        ]);
        return view('trainingsession.data');
    }

    public function show($id)
    {
        $trainingsession = TrainingSession::find($id);
        return view('trainingsession.show', [
            'trainingsession' => $trainingsession
        ]);
    }
    public function edit($id)
    {
        $trainingsessions = TrainingSession::all();
        $trainingsession = TrainingSession::find($id);
        return view('trainingsession.edit', [
            'trainingsession' => $trainingsession,
            'trainingsessions' => $trainingsessions

        ]);
    }
    public function update(Request $request, $id)
    {
        $trainingsession = TrainingSession::findorfail($id);
        $trainingsession->update([
            'name' => $request['name'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' => $request['city_id'],
        ]);
        return redirect()->route('trainingsession.index_view');
    }

    public function destroy($id)
    {
        if (!AttendanceUser::where('session_id', '=', $id)->exists()) {
            TrainingSession::find($id)->delete();
            return redirect()->route('trainingsession.index_view');
        } else {
            return back()->with('error', 'Session has attendants!');
        };
    }
}
