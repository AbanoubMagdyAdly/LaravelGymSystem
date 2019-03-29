<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainee;
use App\TrainingPackage;
use App\Gym;
use App\City;
use App\TrainingPackagePurchase;
class RevenueController extends Controller
{
    public function index()
    {

        return datatables()->of(TrainingPackagePurchase::with(['gym','trainee','city']))->toJson();
    }

    public function index_view()
    {
        return view(
            'admin/revenue'
        );
    }


  
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
   
        TrainingPackagePurchase::create([
            'created_at'=> now(),
            'trainee_id' => $request->trainee_id,
            'package_id' => $request->package_id,
            'gym_id' => $request->gym_id,
            'city_id' =>$request->city_id ,
            'price' => $request->price,

            ]);
       
        return view ('admin/admin');
    }

    public function buy(Request $request){
        $package= TrainingPackage::find($request->package_id);
        $gym = Gym::find($request->gym_id);
        $city = City::find($request->city_id);
        $trainee= Trainee::find($request->trainee_id);
        return view ('revenue/buyPackage',[
            'package'=> $package,
            'gym'=>$gym,
            'city'=>$city,
            'trainee'=>$trainee
        ]);
    }


}
