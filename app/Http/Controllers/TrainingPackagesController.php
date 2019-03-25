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
    public function store(StorePackageRequest $request)
   {
    // $request->validate([
    //     'name' => 'require',
    //     'price' => 'required|number',
    //     'capacity' => 'required|number',
    // ]);
    
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
        // 'title' => 'required|min:3|unique:posts,title,'.$this->post['id'],
        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required|number',
        //     'capacity' => 'required|number',
        // ]); 
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
        // $package=TrainingPackage::findorfail($id);
        // $package->delete();
        // return redirect()->route('packade/TrainingPackagesController.index_view');
        return view('admin/admin');
    }
    
}
