<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingPackage;
class TrainingPackagesController extends Controller
{
    public function index()
    {
        return datatables()->of(TrainingPackage::query())->toJson();
    }

    public function index_view()
    {
        return view(
            'admin/package'
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/package/TrainingPakageCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
            TrainingPackage::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'capacity' => $request['capacity'],
        
            ]);
      
        return redirect()->route('admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = TrainingPackage::findorfail($id);
        return view('TrainingPackage.show', [
            'package'=>$package
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $package=TrainingPackage::findorfail($id);
        return view('package/trainingPackageedit',[
            
                'package'=>$package
        ]
        );
  
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
        $package=TrainingPackage::findorfail($id);
        $package->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'capacity' => $request['capacity'],
            
            ]);
        return redirect()->route('TrainingPackagesController.index_view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=TrainingPackage::findorfail($id);
        $package->delete();
        return redirect()->route('TrainingPackagesController.index_view');
    }
}
