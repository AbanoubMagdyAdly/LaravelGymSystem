<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role:: create(['name'=>'admin']);
        // Role:: create(['name'=>'city_manager']);
        // Role:: create(['name'=>'gym_manager']);
        // $permission = Permission::create(['name' => 'CRUD_training_sessions']);
        // $permission = Permission::create(['name' => 'assign_coaches_to_sessions']);
        // $permission = Permission::create(['name' => 'buy_sessions_to_users']);
        // $permission = Permission::create(['name' => 'show_city_gyms']);
        // $permission = Permission::create(['name' => 'CRUD_gyms']);
        // $permission = Permission::create(['name' => 'CRUD_city_gyms_manager']);


        return view('home');
    }
}
