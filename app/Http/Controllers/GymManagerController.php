<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\GymManager\StoreGymManagerRequest;
use App\Http\Requests\GymManager\UpdateGymManagerRequest;
use Illuminate\Support\Facades\Storage;

class GymManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(User::query())->toJson();
    }

    public function index_view()
    {
        return view(
            'admin/data'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/managers/GymManagerCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGymManagerRequest $request)
    {
        if ($request->hasFile("avatar_image")) {
            $path = Storage::putFile('public/avatar_image', $request->file('avatar_image'));
            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'avatar_image'=>basename($path),
            ]);
        } elseif (! $request->hasFile("avatar_image")) {
            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             ]);
        }
        return redirect()->route('GymManager.store')->with('message', 'Created Successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gym_manager = User::findorfail($id);
        return view('/managers/ManagerShow', [
            'manager'=>$gym_manager
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gym_manager = User::find($id);
        return view('/managers/GymManagerEdit', [
                'gym_manager'=>$gym_manager
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGymManagerRequest $request, $id)
    {
        $gym_manager = User::findorfail($id);
        if ($request->hasFile("avatar_image")) {
            $path = Storage::putFile('public/avatar_image', $request->file('avatar_image'));
            $city_manager->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'avatar_image'=>basename($path),
            ]);
        } elseif (! $request->hasFile("avatar_image")) {
            $gym_manager->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             ]);
        }
        return redirect()->route('GymManager.index_view')->with('message', 'Updated Successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return view('admin/admin');
    }
}
