<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance = Attendance::all();
        return view('backend.supervisor.attendance.index',compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.supervisor.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "roll"=>"required",
            "status"=>"required"
        ]);
        $attendance=new Attendance();
        $attendance->name=$request->name;
        $attendance->roll=$request->roll;
        $attendance->status=$request->status;
        $attendance->save();
        // $request->session()->flash('message','Record Saved');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::find($id);
        return view('backend.supervisor.attendance.edit',compact('attendance'));
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
        $this->validate($request,[
            "name"=>"required",
            "roll"=>"required",
            "status"=>"required"
        ]);
        $attendance=Attendance::find($id);
        $attendance->name=$request->name;
        $attendance->roll=$request->roll;
        $attendance->status=$request->status;
        $attendance->save();
        // $request->session()->flash('message','Record Saved');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect()->back();
    }
}
