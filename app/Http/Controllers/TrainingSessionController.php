<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingSession;

class TrainingSessionController extends Controller
{
    public function index()
    {
        return datatables()->of(TrainingSession::query())->toJson();
    }

    public function index_view()
    {
        return view(
            'trainingsession/data'
        );
    }
    public function create()
    {
        $trainingsessions=TrainingSession::all();
//        dd($gyms[1]['id']);
        return view('trainingsession.create',[
            'trainingsessions'=>$trainingsessions
        ]);
    }

    public function store(Request $request)
    {
        TrainingSession::create([
            'id'=>$request['id'],
            'name' => $request['name'],
            'image'=>$request['image'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' =>$request['city_id'],

        ]);
        return view('trainingsession.data');
    }

    public function show($id)
    {
        $trainingsession = TrainingSession::findorfail($id);
        return view('trainingsession.show', [
            'trainingsession'=>$trainingsession
        ]);
    }
    public function edit($id)
    {
        $trainingsessions=TrainingSession::all();
        $trainingsession = TrainingSession::find($id);
        return view('trainingsession.edit', [
            'trainingsession'=>$trainingsession,
            'trainingsessions'=>$trainingsessions

        ]);
    }
    public function update(Request $request, $id)
    {
        $trainingsession = TrainingSession::findorfail($id);
        $trainingsession->update([
            'name' => $request['name'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' =>$request['city_id'],
        ]);
        return redirect()->route('trainingsession.index_view');
    }

    public function destroy($id)
    {
        TrainingSession::where('id',$id)->delete();
        return view('admin/admin');
    }
}
