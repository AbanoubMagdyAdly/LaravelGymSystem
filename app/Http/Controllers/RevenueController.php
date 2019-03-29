<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainee;
use App\TrainingPackage;
use App\Gym;
use App\City;
class RevenueController extends Controller
{
    public function create()
    {
        $gyms = Gym::all();
        $cities = City::all();
        $trainee=Trainee::all();
        $package=TrainingPackage::all();
    
        return view('revenue.create', [
            'gyms' => $gyms,
            'cities'=> $cities,
            'packages'=>$package,
            'trainees'=>$trainee,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Revenue::create([
            'trainee_id' => $request['trainee_id'],
            'package_id' => $request['package_id'],
            'gym_id' => $request['gym_id'],
            'city_id' => $request['city_id'],
            'price' => $request['price'],


            ]);
       
        return redirect()->route('revenue.store')->with('message', 'Created Successfully!');
    }


}
