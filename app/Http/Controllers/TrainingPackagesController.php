<?php

namespace App\Http\Controllers;

use App\Http\Requests\package\StorePackageRequest;
use Illuminate\Http\Request;
use App\TrainingPackage;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TrainingPackagesController extends Controller
{
    public function index()
    
    {

        return datatables()->of(TrainingPackage::all())->toJson();
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
        return view('/package/TrainingPackageCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {

        TrainingPackage::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'capacity' => $request['capacity'],
            ]);


        return redirect()->route('TrainingPackagesController.index_view');
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
        return view('package/show', [
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
        return view(
            'package/trainingPackageedit',
            [

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
            'price' => $request['price']*100,
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
        TrainingPackage::where('id', $id)->delete();
    
        return redirect()->route('TrainingPackagesController.index_view');
    }
}
