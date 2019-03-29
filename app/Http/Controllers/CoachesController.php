<?php

namespace App\Http\Controllers;
use App\Coache;

use App\CoachesSession;
use App\Gym;
use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Requests\Coache\StoreCoacheRequest;
use App\Http\Requests\Coache\UpdateCoacheRequest;

class CoachesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return datatables()->of(Coache::query())->toJson();
    }

    public function index_view()
    {

        return view(
            'admin/coache'
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gyms=Gym::all();
        $trainingSessions=TrainingSession::all();
        return view('/coache/create',[
            'gyms'=>$gyms,
            'trainingSessions'=>$trainingSessions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoacheRequest $request)
    {
        $coache=Coache::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,

            ]);

        CoachesSession::create([
            'gym_id'=>$request->gym_id,
            'session_id'=>$request->training_session,
            'coach_id'=> $coache->id,
        ]);

        return redirect()->route('Coaches.store')->with('message', 'Created Successfully!');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coache = Coache::findorfail($id);
        // $ban=$coache->isBanned();
        // $unban=$coache->isNotBanned();
        return view("coache/show", [
            'coache'=>$coache,
            // 'bann'=>$ban,
            // 'unban'=>$unban
        ]);
    }
    // public function ban($id)
    // {
    //     $coache = Coache::findorfail($id)->ban([
    //         'comment' => 'Enjoy your ban!',
    //     ]);
    //     // $sban=$coache->ban();
    //     // User::create([ 'banned_at'=>$sban ]);
    //     return redirect()->route('coaches.index_view');
    // }
    // public function unban($id)
    // {
    //     $coache = Coache::findorfail($id);
    //     $coache->unban();
    //     return redirect()->route('coaches.index_view');
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coache = Coache::find($id);
        return view('/coache/edit', [
                'coache'=>$coache
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoacheRequest $request, $id)
    {
        $coache = Coache::findorfail($id);
        $coache->update([
            'name' => $request['name'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'date_of_birth' => $request['date_of_birth']

            ]);
        return redirect()->route('Coaches.index_view')->with('message', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coache::where('id', $id)->delete();
        return view('admin/coache');
    }

}
