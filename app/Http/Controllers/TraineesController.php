<?php

namespace App\Http\Controllers;
use App\Trainee;
use Illuminate\Http\Request;

class TraineesController extends Controller
{
    public function index()
    {
        return datatables()->of(Trainee::all())->toJson();
    }

    public function index_view()
    {
        return view(
            'admin/trainees'
        );
    }
    public function destroy($id)
    {
        Trainee::where('id', $id)->delete();
     
        return redirect()->route('TraineesController.index_view');
    }
    public function edit($id)
    {

        $trainee=Trainee::findorfail($id);
        return view('trainee/traineeedit',[
            
                'trainee'=>$trainee
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
        $trainee=Trainee::findorfail($id);
        $trainee->update([
            'name' => $request['name'],
            'gender' => $request['gender'],
            'date_of_birth' => $request['date_of_birth'],
            'email' => $request['email'],
            ]);
        return redirect()->route('TraineesController.index_view');
    }
    
}
