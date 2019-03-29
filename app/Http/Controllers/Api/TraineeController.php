<?php

namespace App\Http\Controllers\Api;
use App\AttendanceUser;
use App\City;
use App\Gym;
use App\PackagePurchase;
use App\Trainee;
use App\TrainingPackage;
use App\TrainingPackagePurchase;
use App\TrainingSession;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TraineeResource;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Carbon\Carbon;


class TraineeController extends Controller
{
    public function index()
    {

        return TraineeResource::collection(Trainee::all());

    }

    public function create($id)
    {
        $dateNow = Carbon::today();
        $trainee=\auth()->user();
        $session=TrainingSession::find($id);
        if ($session)  {
            if (Carbon::parse(TrainingSession::find($id)->date_of_session)->eq($dateNow)) {
                $gym=Gym::where('id',$session->id)->first();
                $city=City::where('id',$gym->city_id)->first();
                if(TrainingPackagePurchase::where('trainee_id',$trainee->id)->first()){
                    $purchasedPackage=TrainingPackagePurchase::where('trainee_id',$trainee->id)->first();
                    $packageCapacity=TrainingPackage::where('id',$purchasedPackage->package_id)->first()->capacity;
                    $remainingSessions=$packageCapacity-$trainee->attended_sessions;
                }else{ $purchasedPackage=null ;}
                if( $purchasedPackage && $remainingSessions >0 ){
                    $attendance = new AttendanceUser();
                    $attendance->user_id = $trainee->id;
                    $attendance->session_id = $id;
                    $attendance->gym_id = $gym->id;
                    $attendance->city_id = $city->id;
                    $attendance->attendance_date=1;
                    $attendance->attendance_time=2;
                    $trainee->attended_sessions+=1;
                    $trainee->save();
                    $attendance->save();
                    return response()->json([
                        'message' => 'Session  Created Successfully'
                    ]);
                }else {
                    return response()->json([
                        'message' => 'You have to buy training session'
                    ]);
                }
            }else {
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







