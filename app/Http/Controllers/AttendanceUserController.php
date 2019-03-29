<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AttendanceUser;

class AttendanceUserController extends Controller
{
    public function index()
    {

        return datatables()->of(AttendanceUser::with(['gym','user','session','city']))->toJson();
    }

    public function index_view()
    {
        return view(
            'attendance/data'
        );
    }
    public function create()
    {
    }

    public function store(Request $request)
    {

    }
}
