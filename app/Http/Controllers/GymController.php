<?php

namespace App\Http\Controllers;

use App\Gym;
use Illuminate\Http\Request;
use App\User;

class GymController extends Controller
{

    public function index()
    {
        return datatables()->of(Gym::query())->toJson();
    }

        public function index_view()
        {
          return view('gym.data');
        }
    public function create()
    {
        $gyms=Gym::all();
//        dd($gyms[1]['id']);
        return view('gym.create',[
            'gyms'=>$gyms
        ]);
    }

    public function store(Request $request)
    {
        Gym::create([
            'id'=>$request['id'],
            'name' => $request['name'],
            'image'=>$request['image'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' =>$request['city_id'],

        ]);
        return view('gym.data');
    }

    public function show($id)
    {
        $gym = Gym::findorfail($id);
        return view('gym.show', [
            'gym'=>$gym
        ]);
    }
    public function edit($id)
    {
        $gyms=Gym::all();
        $gym = Gym::find($id);
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
        return view('gym.data');
    }

    public function destroy($id)
    {
        Gym::where('id',$id)->delete();
        return view('admin/admin');
    }

}
