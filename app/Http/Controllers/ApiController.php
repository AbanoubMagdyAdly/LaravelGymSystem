<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\RegisterAuthRequest;
use App\Trainee;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
 
class ApiController extends Controller
{
    

    public $loginAfterSignUp = true;
 
    public function register(RegisterAuthRequest $request)
    {
        $user = new Trainee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;        
        $user->password_confirmation = Hash::make($request->password);
        $user->password = Hash::make($request->password_confirmation);
        $user->save();
 
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }
 
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }
 
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        // dd(auth('api')->attempt($input));
        if(auth('api')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){
            $user=auth('api')->user();
            // dd($user->trainee_token);
            $user->trainee_token=auth('api')->attempt($input);
            // dd($user->trainee_token);

            // dd($user);
            $user->save();
            return $user;
        }

        $input = $request->only('email', 'password');
                // dd($input);

        // $input['password']= bcrypt($input['password']);
       // dd($input);
        $jwt_token = null;
         $token=auth('api')->attempt($input);
         dd($token);
        dd(JWTAuth::attempt($input));
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
}