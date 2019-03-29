<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trainee\RegisterAuthRequest;
use App\Http\Requests\Trainee\UpdateTraineeRequest;
use App\Trainee;
use Carbon\Carbon;
use App\VerifyUser;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use App\Notifications\WelcomeNewUser;

class ApiController extends Controller
{
    public $loginAfterSignUp = true;

//------------------ Registering User ------------------------------------------

    public function register(RegisterAuthRequest $request)
    { 
        $user = new Trainee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->password_confirmation = Hash::make($request->password);
        $user->password = Hash::make($request->password_confirmation);
        if ($user) {
            $path = Storage::putFile('public/trainees', $request->file('image'));
            $user->image = $path;
            $user->save();
            $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)]); }
        $email = $user->email;
         Mail::to($email)->send(new VerifyMail($user,$verifyUser));
        return response()->json([
            'success' => true,
            'data' => $user], 200);
    }

// -------------------------- Logging In ------------------------------------

    public function login(Request $request)
{
    $input = $request->only('email', 'password');
    if (auth('api')->attempt([
        'email' => $request->input('email'),
        'password' => $request->input('password')
    ])) {
        $user = auth('api')->user();
        $user->last_login = Carbon::now();
        $jwt_token = auth('api')->attempt($input);
    {   $input = $request->only('email', 'password');
        if (auth('api')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])) {
             $user=auth('api')->user();
             if (!$user->confirmed) {
             auth()->logout();
            return response()->json([
                    'message'=>'You need to confirm your account. We have sent you an activation code, please check your email.',]);}
            $user->last_login=Carbon::now();
            $jwt_token=auth('api')->attempt($input);
            $user->save();
            return response()->json([
                    'success'=>true,
                    'user'=>$user,
                    'token'=>$jwt_token,]); }

        $user->save();
        return response()->json([
            'success' => true,
            'user' => $user,
            'token' => $jwt_token,
        ]);
    }

    if (!$jwt_token = auth('api')->attempt($input)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
    }
}
}

//------------------------- Verify User -----------------------------------------

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        //dd($verifyUser);
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->confirmed) {
                $verifyUser->user->confirmed = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
                $user->notify(new WelcomeNewUser());
                return response()->json([
                'status' => $status,], 201); 
            }else{
                $status = "Your e-mail is already verified. You can now login.";
                return response()->json([
                'status' => $status,], 201); 
            }
        }
               
            } 

//----------------------- Logging Out ----------------------------------------------

    public function logout(Request $request)
    {
        try {
            auth()->logout();
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out' ], 500);
        }
        return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
    }

//----------------------- Get Auth User ---------------------------------------------

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::authenticate($request->token);
}


//----------------- Update User Data ------------------------------------------------------

    public function update(UpdateTraineeRequest $request){
        $trainee = auth('api')->user();
        if (!$trainee) {
            return response()->json([
                'success' => false,
                'message' => 'Your Data Cannot be Updated'], 400);
        }
        $input = $request->only('name', 'image','password','password_confirmation','gender','date_of_birth');
        $updated = $trainee->fill($input)->save();
        if ($request->hasFile("image")) {
            $path = Storage::putFile('public/trainees', $request->file('image'));

        }
        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
            'message' => 'Your Data Cannot be Updated'], 500);
        }
    }
}