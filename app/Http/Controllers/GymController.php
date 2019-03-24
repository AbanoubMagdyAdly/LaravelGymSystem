<?php

namespace App\Http\Controllers;

use App\Gyms;
use Illuminate\Http\Request;

class GymController extends Controller
{

    public function index()
    {
        return datatables()->of(Gyms::query())->toJson();
    }

        public function index_view()
        {
            $data=datatables()->of(Gyms::query())->toJson();
            return view(
                'admin/data',[
                    $data
                ]
            );
        }
    public function create()
    {
        $gyms=Gyms::all();
        return view('gym.create',[
            'gyms'=>$gyms
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
        Gyms::create([
            'name' => $request['name'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' =>$request['city_id'],

        ]);
        return redirect()->route('gym.index_view');
    }

    public function show($id)
    {
        $gym = Gyms::findorfail($id);
        return view('gym.show', [
            'gym'=>$gym
        ]);
    }
    public function edit($id)
    {
        $gyms=Gyms::all();
        $gym = Gyms::find($id);
        return view('gym.edit', [
            'gym'=>$gym,
            'gyms'=>$gyms

        ]);
    }
    public function update(Request $request, $id)
    {
        $gym = User::findorfail($id);
        $gym->update([
            'name' => $request['name'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' =>$request['city_id'],
        ]);
        return redirect()->route('gym.index_view');
    }

    public function destroy($id)
    {
        Gyms::where('id',$id)->delete();
        return view('admin/admin');
    }

}
