<?php

namespace App\Http\Controllers\Api;
use App\AttendanceUser;
use App\Gym;
use App\PackagePurchase;
use App\Trainee;
use App\TrainingPackage;
use App\TrainingPackagePurchase;
use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TraineeResource;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Carbon\Carbon;


class TraineeController extends Controller
{
    public function index()
    {

        return TraineeResource::collection(Trainee::all());//see all posts
        // return TraineeResource::collection($trainees);//select only 3

    }

//    public function show($trainee)
//    {
//        // dd($trainees);
//        $trainee = Trainee::findOrFail($trainee);
//        return new TraineeResource($trainee);
//    }

    public function store(Request $request)
    {
//         dd($request->all());
        //  Trainee::create($request->all());
        Trainee::create([
            'name' => $request['name'],
            'gender' => $request['gender'],
            'date_of_birth' => $request['date_of_birth'],
            'email' => $request['email'],
            'password_confirmation' => Hash::make($request['password_confirmation']),
            'password' => Hash::make($request['password']),
            'image' => $request['image'],

        ]);
        return response()->json([
            'message' => 'trainees Created Successfully'
        ], 201);
    }

    public function destroy(trainee $trainee)
    {
        $trainee->delete();
        return response()->json([
            'message' => 'delete Successfully'
        ]);
    }

    public function update(Request $request, trainee $trainee)
    {
        $trainee->name = $request->name;

        $trainee->update(['name' => $request->name, 'gender' => $request->gender, 'date_of_birth' => $request->date_of_birth, 'image' => $request->image]);

        // $trainees->update($request->all());
        return $trainee;
        // return response()->json([
        //     'message' => 'up Successfully'
        // ]);
    }

    public function create(Request $request, $id)
    {
        $dateNow = Carbon::today();
//        dd(auth()->user()->id);
        $package=TrainingPackagePurchase::where('trainee_id',auth()->user()->id)->get();
        dd($package->original);
        if (TrainingSession::find($id)  ) {
            if (TrainingSession::find($id)->date_of_session < $dateNow) {
                $attendance = new AttendanceUser();
                $attendance->name = TrainingSession::find($id)->name;
                $attendance->user_id = 1;
                $attendance->session_id = $id;
                $attendance->gym_id = TrainingSession::find($id)->gym_id;
                $attendance->city_id = 1;
                $attendance->save();
                return response()->json([
                        'message' => 'Session  Successfully'
                    ]);
            } else {
                return response()->json(['message' => 'You have to buy earlier']);
            }
        } else {
            return response()->json(['message' => 'Error Session ID']);
        }
    }

    public function show(){
        $trainee=\auth()->user();
        $purchasedPackage=TrainingPackagePurchase::where('trainee_id',$trainee->id)->first()->package_id;
        $packageCapacity=TrainingPackage::where('id',$purchasedPackage)->first()->capacity;
        $remainingSessions=$packageCapacity-$trainee->attended_sessions;
        return response()->json([
            'total_sessions'=>$packageCapacity,
            'remaining_sessions'=>$remainingSessions,
        ]);

    }

    public function showHistory(){
        $trainee=\auth()->user();
        $attendedSessions=AttendanceUser::where('user_id',$trainee->id)->get()->toArray();
        foreach ($attendedSessions as $session){
            $attandanceDate[]=$session['attendance_date'];
        }
        foreach ($attendedSessions as $session){
            $attandanceTime[]=$session['attendance_time'];

        }
        foreach ($attendedSessions as $session){
            $sessionsName[]=TrainingSession::where('id',$session['session_id'])->first()['name'];
        }
        foreach ($attendedSessions as $session){
            $gymsName[]=Gym::where('id',$session['gym_id'])->first()['name'];
        }
        return response()->json([
            'sessions_name'=>$sessionsName,
            'gym_name'=>$gymsName,
            'attandance_date'=>$attandanceDate,
            'attandance_time'=>$attandanceTime,
        ]);

    }
}







