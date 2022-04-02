<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignment = Assignment::all();
        return view('backend.supervisor.assignment.index',compact('assignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supervisor.assignment.create');
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
            "subject_name"=>"required",
            "image"=>"required"
        ]);
        $assignment= new Assignment();
        $assignment->subject_name=$request->subject_name;
        if($request->hasFile('image')){
            $file = $request->image;
            $newName = time(). $file->getClientOriginalName();
            $file->move('uploads/assignment/',$newName);
            $assignment->image = 'uploads/assignment/'. $newName;

        }
        $assignment->save();
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
        $assignment = Assignment::find($id);
        return view('backend.supervisor.assignment.edit',compact('assignment'));
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
            "subject_name"=>"required",
        ]);

        $assignment= Assignment::find($id);
        $assignment->subject_name=$request->subject_name;
        if($request->hasFile('image')){
            $file = $request->image;
            $newName = time(). $file->getClientOriginalName();
            $file->move('uploads/assignment/',$newName);
            $assignment->image = 'uploads/assignment/'. $newName;

        }
        $assignment->save();
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
       $assignment = Assignment::find($id);
       $assignment->delete();
       if (file_exists($assignment->image)) {

        @unlink($assignment->image);

    }
       return redirect()->back();
    }
}
