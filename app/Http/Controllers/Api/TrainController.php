<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainController extends Controller
{   protected $user;
 
public function __construct()
{
    $this->user = JWTAuth::parseToken()->authenticate();
}

public function index()
{
  return TraineeResource::collection(Trainee::all());
}


public function show($id)
{
     $trainee=Trainee::findOrFail($trainee);
    if (!$trainee) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, product with id ' . $id . ' cannot be found'
        ], 400);
    }
 
    return $trainee;
}
public function store(Request $request)
{
             Trainee::create([
            'name' => $request['name'],
            'gender'=> $request['gender'],
            'date_of_birth'=> $request['date_of_birth'],
            'email' => $request['email'],
            'password_confirmation'=>Hash::make($request['password_confirmation']),
            'password' => Hash::make($request['password']),
            'image'=>$request['image'],

            ]);

        return response()->json([
            'success' => false,
            'message' => 'Sorry, product could not be added'
        ], 500);

 }



}
