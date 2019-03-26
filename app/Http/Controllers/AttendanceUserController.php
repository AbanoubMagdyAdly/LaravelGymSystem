<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AttendanceUser;

class AttendanceUserController extends Controller
{
    public function index()
    {

        return datatables()->of(AttendanceUser::with(['gym','user','session']))->toJson();
    }

    public function index_view()
    {
        // dd(datatables()->of(AttendanceUser::query())->toJson());
        return view(
            'attendance/data'
        );
    }
    public function create()
    {
        // return view('/CityManagerCreate');
    }

    public function store(Request $request)
    {
        // User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password'])
        //     ]);
        // return redirect()->route('CityManager.store');
    }
}
