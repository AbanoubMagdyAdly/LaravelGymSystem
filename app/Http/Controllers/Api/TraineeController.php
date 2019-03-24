<?php

namespace App\Http\Controllers\Api;
use App\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TraineeResource;
use Illuminate\Support\Facades\Hash;
class TraineeController extends Controller implements MustVerifyEmail
{
    public function index()
    {
        // die();
        return TraineeResource::collection(Trainee::all());//see all posts
        // return TraineeResource::collection($trainee);//select only 3
     
    } 
    public function show($trainee)
    {
        // dd($trainee);
        $trainee=Trainee::findOrFail($trainee);
        return new TraineeResource($trainee);
    }
    public function store(Request $request)
    {
        // dd($request->all());
      //  Trainee::create($request->all());
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
            'message' => 'trainee Created Successfully'
        ],201);
    }

    public function destroy(trainee $trainee)
    {
        $trainee->delete();
        return response()->json([
            'message' => 'delete Successfully'
        ]);
    }
    public function update(Request $request,trainee $trainee)
    {
        dd($trainee);
        // $request['name']=$request->name;
        $trainee->update($request->all());
        // dd($trainee->name);
        return response()->json([
            'message' => 'up Successfully'
        ]);
    }
}
// $this->ProductUserCheck($product);
// $request['detail'] = $request->description;
// unset($request['description']);
// $product->update($request->all());
// return response([
//     'data' => new ProductResource($product)
// ],Response::HTTP_CREATED);