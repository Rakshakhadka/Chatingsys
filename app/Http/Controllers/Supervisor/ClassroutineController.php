<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Classroutine;
use Illuminate\Http\Request;

class ClassroutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroutine= Classroutine::all();
        return view('backend.supervisor.classroutine.index',compact('classroutine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supervisor.classroutine.create');
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
            "supervisor_name"=>"required",
            "class_name"=>"required",
            "day"=>"required",
            "time"=>"required"
        ]);
        $classroutine=new Classroutine();
        $classroutine->supervisor_name=$request->supervisor_name;
        $classroutine->class_name=$request->class_name;
        $classroutine->day=$request->day;
        $classroutine->time=$request->time;
        $classroutine->save();
        $request->session()->flash('message','Record Saved');
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
        //
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
            "supervisor_name"=>"required",
            "class_name"=>"required",
            "day"=>"required",
            "time"=>"required"
        ]);
        $classroutine=Classroutine::find($id);
        $classroutine->supervisor_name=$request->supervisor_name;
        $classroutine->class_name=$request->class_name;
        $classroutine->day=$request->day;
        $classroutine->time=$request->time;
        $classroutine->save();
        $request->session()->flash('message','Record Saved');
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
        //
    }
}
