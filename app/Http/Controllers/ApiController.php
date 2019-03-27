<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\RegisterAuthRequest;
use App\Trainee;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Storage;


 
class ApiController extends Controller
{
    

    public $loginAfterSignUp = true;
    public function register(RegisterAuthRequest $request)
    {   
        $user = new Trainee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;        
        $user->password_confirmation = Hash::make($request->password);
        $user->password = Hash::make($request->password_confirmation);
//        $user->trainee_token=str_random(60);
        if ($user) {
            $path = Storage::putFile('public/trainees', $request->file('image'));
            $user->image = $path;

            $user->save();
        }
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }


 
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        if(auth('api')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){
            $user=auth('api')->user();
            dd($user);
            // dd($user->trainee_token);
            $user->trainee_token=auth('api')->attempt($input);
            $user->save();
            return $user;
        }
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = auth('api')->attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }
 
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
 
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['trainees' => $user]);
    }
    public function update(Request $request)
    {   dd(auth('api')->user());
        $trainee = Trainee::findOrFail($id);
       if (!$trainee) {
            return response()->json([
                'success' => false,
                'message' => 'Your Data Cannot be Updated'], 400); }
        $input = $request->only('name', 'image');
        $updated = $trainee->fill($input)->save();
        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
            'message' => 'Your Data Cannot be Updated'], 500);
        }}
}