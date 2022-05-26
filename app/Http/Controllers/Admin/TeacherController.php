<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::query()
        ->orderBy("name", "asc")
        ->filter(request(['search']))
        ->paginate(10);
        return view("data.teachers.index", compact("teachers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("data.teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nig" => "required",
            "name" => "required",
            "email" => "required",
            "alamat" => "required",
            "agama" => "required",
            "gender" => "required",
            "number" => "required",
        ]);
        $teacher = Teacher::create([
            "nig" => $request->nig,
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt('password'),
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "gender" => $request->gender,
            "no_hp" => $request->number,    
        ]);
        $teacher->assignRole("teacher");
        $request->session()->flash('success', 'A new teacher has been added');
        return redirect()->route('teachers.index');
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
        $teacher = Teacher::findorFail($id);
        return view("data.teachers.edit", compact("teacher"));
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
        $teacher = Teacher::find($id);
        $request->validate([
            "nig" => "required",
            "name" => "required",
            "email" => "required",
            "alamat" => "required",
            "agama" => "required",
            "gender" => "required",
            "number" => "required",
        ]);
        if($teacher){
            $teacher->update([
                "nig" => $request->nig,
                "name" => $request->name,
                "email" => $request->email,
                "alamat" => $request->alamat,
                "agama" => $request->agama,
                "gender" => $request->gender,
                "no_hp" => $request->number,    
            ]);
            $request->session()->flash('success', 'Teacher has been updated');
            return redirect()->route('teachers.index');
        }
        $request->session()->flash('error', 'Teacher not found');
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        $request->session()->flash('success', "$teacher->name has been deleted");
        return redirect()->route('teachers.index');
    }
}
