<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $gym_manager = DB::table('managers')->where('role', 'gym_manager');
         return view('gym_manager.index',['managers'=>$gym_manager]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gym_manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Manager::create($request->all());
        return redirect()->route('gym_manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $gym_manager)
    {
            return view('gym_manager.show', [
            'gym_manager' => $gym_manager
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $gym_manager)
    {
            return view('gym_manager.edit', [
             'gym_manager' => $gym_manager
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$gym_manager)
    {
            $gym_manager= Manager::find($gym_manager);
            $gym_manager -> update($request->all());
            return redirect()->route('gym_manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gym_manager)
    {
        $gym_manager= Manager::find($gym_manager);
        $gym_manager -> delete();
        return redirect()->route('gym_manager.index');


    }
}
