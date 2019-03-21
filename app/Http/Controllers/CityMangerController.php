<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityMangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city_manager = DB::table('managers')->where('role', 'city_manager');
        return view('city_manager.index', [
            'managers'=>$city_manager
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city_manager.create');
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
        return redirect()->route('city_manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city_manager = Manager::findorfail($id);
        return view('city_manager.show', [
            'manager'=>$city_manager
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
        $city_manager = Manager::find($id);
        return view('city_manager.edit', [
                'city_manger'=>$city_manager
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city_manager = Manager::find($id);
        $city_manager->update($request->all());
        return redirect()->route('city_manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city_manager = Manager::find($id);
        $city_manager->delete();
        return redirect()->route('city_manager.index');
    }
}
