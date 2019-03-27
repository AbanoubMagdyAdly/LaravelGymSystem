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
<<<<<<< HEAD
=======

>>>>>>> 81ff8fa9d1297b0a29f1da8e5bf1e1a55501c3ac
        $user = new Trainee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;        
        $user->password_confirmation = Hash::make($request->password);
        $user->password = Hash::make($request->password_confirmation);
<<<<<<< HEAD
//        $user->trainee_token=str_random(60);
        if ($user) {
            $path = Storage::putFile('public/trainees', $request->file('image'));
            $user->image = $path;

            $user->save();
        }
=======

        if ($user){
        $path = Storage::putFile('public/trainees', $request->file('image'));
        $user->image = $path;
        $user->save();
    }

        
>>>>>>> 81ff8fa9d1297b0a29f1da8e5bf1e1a55501c3ac
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }


 
    public function login(Request $request)
    {  // 
        $input = $request->only('email', 'password');
        if(auth('api')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){
<<<<<<< HEAD
            $user=auth('api')->user();
            dd($user);
            // dd($user->trainee_token);
            $user->trainee_token=auth('api')->attempt($input);
=======

            $user=auth('api')->user();
            $jwt_token=auth('api')->attempt($input);
>>>>>>> 81ff8fa9d1297b0a29f1da8e5bf1e1a55501c3ac
            $user->save();
            return response()->json([
                    'success'=>true,
                    'user'=>$user,
                    'token'=>$jwt_token,
            ]);
        }
<<<<<<< HEAD
        $input = $request->only('email', 'password');
        $jwt_token = null;
=======
      
>>>>>>> 81ff8fa9d1297b0a29f1da8e5bf1e1a55501c3ac
        if (!$jwt_token = auth('api')->attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    }
 
    public function logout(Request $request)
    {
        try{
            auth()->logout();
        }catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
     return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
    
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
    {  
            $trainee = auth('api')->user();
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