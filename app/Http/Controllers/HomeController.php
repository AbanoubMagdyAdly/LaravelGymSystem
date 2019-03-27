<?php
namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
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
        // $role = Role:: create(['name'=>'admin']);
        // $role1 = Role:: create(['name'=>'city_manager']);
        // $role2 =  Role:: create(['name'=>'gym_manager']);
        // $permission = Permission::create(['name' => 'CRUD_training_sessions']);
        // $role->givePermissionTo($permission);
        // $role1->givePermissionTo($permission);
        // $role2->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'assign_coaches_to_sessions']);
        // $role2->givePermissionTo($permission);
        // $role1->givePermissionTo($permission);
        // $role->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'buy_sessions_to_users']);
        // $role->givePermissionTo($permission);
        // $role1->givePermissionTo($permission);
        // $role2->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'show_city_gyms']);
        // $role->givePermissionTo($permission);
        // $role1->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'CRUD_gyms']);
        // $role->givePermissionTo($permission);
        // $role1->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'CRUD_city_gyms_manager']);
        // $role->givePermissionTo($permission);
        // $role1->givePermissionTo($permission);
        // $permission = Permission::create(['name' => 'CRUD_city_managers']);
        // $role->givePermissionTo($permission);


        return view('home');
    }
    public function admin()
    {
        return view('admin/admin');
    }
    public function data()
    {
        return view('admin/data');
    }
    public function buy($request)
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        dd($request);
        \Stripe\Stripe::setApiKey("sk_test_ah8BPqY1IotKT7B8bfbOmQSX00I0BoDobX");
        $data=request()->all();
        $token = $data['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => 999,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
        return view('/admin');
    }
    public function show()
    {
        return view('admin/buyPackage');
    }
}
