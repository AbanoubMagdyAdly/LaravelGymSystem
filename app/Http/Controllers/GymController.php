<?php

namespace App\Http\Controllers;

use App\Gym;
use Illuminate\Http\Request;
use App\User;
use App\City;
use Illuminate\Queue\Capsule\Manager;

class GymController extends Controller
{

    public function index()
    {
        if (auth()->user()->hasRole('city_manager')) {
            $city_manager = Manager::where('id', '=', auth()->user()->id);
            return datatables()->of(Gym::where('city_id', '=', $city_manager->city_id)->with(['city', 'User']))->toJson();
        } else {
            return datatables()->of(Gym::with(['city', 'User']))->toJson();
        }
    }

    public function index_view()
    {
        return view('gym.data');
    }
    public function create()
    {       
        if (auth()->user()->getRoleNames()[0]=='city_manager') {
            $cities=[];
            $cities [] = City::find(auth()->user()->city_id);
            $gyms = Gym::where('city_id','=',$cities[0]->city_id);
        } else {
            $cities = City::all();
            $gyms = Gym::all(); 
        }
        $managers = User::role("gym_manager")->get();
        
        return view('gym.create', [
            'gyms' => $gyms,
            'managers' => $managers,
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {
        Gym::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'image' => $request['image'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' => $request['city_id'],

        ]);
        return view('gym.data');
    }

    public function show($id)
    {
        $gym = Gym::findorfail($id);
        return view('gym.show', [
            'gym' => $gym
        ]);
    }
    public function edit($id)
    {
        $city = City::all();
        $managers = User::role("gym_manager")->get();
        $gym = Gym::find($id);
        return view('gym.edit', [
            'gym' => $gym,
            'managers' => $managers,
            'cities' => $city,
        ]);
    }
    public function update(Request $request, $id)
    {
        $gym = User::findorfail($id);
        $gym->update([
            'name' => $request['name'],
            'created_at' => $request['created_at'],
            'manager_id' => $request['manager_id'],
            'city_id' => $request['city_id'],
        ]);
        return view('gym.data');
    }

    public function destroy($id)
    {
        Gym::where('id', $id)->delete();
        return view('admin/admin');
    }
}
