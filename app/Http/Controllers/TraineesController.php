<?php

namespace App\Http\Controllers;
use App\Trainee;
use Illuminate\Http\Request;

class TraineesController extends Controller
{
    public function index()
    {
        return datatables()->of(Trainee::query())->toJson();
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
     
        return view('admin/admin');
        // return redirect()->route('Trainees.index_view');
    }
    
}
