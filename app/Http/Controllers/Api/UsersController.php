<?php

namespace App\Http\Controllers\Api;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Resources\UserResource;

class UsersController extends Controller
{
    public function index()
    {
        // die();
        return UserResource::collection(User::all());//see all posts
        // return UserResource::collection($user);//select only 3
     
    } 
    public function show($user)
    {
        // dd($user);
        $user=User::findOrFail($user);
        return new UserResource($user);
    }
    public function store(Request $request)
    {
        User::create($request->all());

        return response()->json([
            'message' => 'Post Created Successfully'
        ],201);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'delete Successfully'
        ]);
    }
}
