<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classroom;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = Student::query()
                    ->orderBy("classroom_id", "asc")
                    ->orderBy("name", "asc")
                    ->filter(request(['search']))
                    ->paginate(10);
        return view("data.students.index", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view("data.students.create", compact("classrooms"));
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
            "nis" => "required",
            "name" => "required",
            "email" => "required",
            "alamat" => "required",
            "agama" => "required",
            "gender" => "required",
            "number" => "required",
            "kelas" => "required",
        ]);
        $student = Student::create([
            "nis" => $request->nis,
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt('password'),
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "gender" => $request->gender,
            "no_hp" => $request->number,
            "classroom_id" => $request->kelas
        ]);
        $student->assignRole("student");
        $request->session()->flash('success', 'A new student has been added');
        return redirect()->route('students.index');
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
        $student = Student::find($id);
        $classrooms = Classroom::all();
        return view("data.students.edit", compact("student", "classrooms"));
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
        $request->validate([
            "nis" => "required",
            "name" => "required",
            "email" => "required",
            "alamat" => "required",
            "agama" => "required",
            "gender" => "required",
            "number" => "required",
            "kelas" => "required",
        ]);
        $student = Student::find($id);
        $student->update([
            "nis" => $request->nis,
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt('password'),
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "gender" => $request->gender,
            "no_hp" => $request->number,
            "classroom_id" => $request->kelas
        ]);
        $request->session()->flash('success', 'Student has been updated');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $student = Student::find($id);
        $student->delete();
        $request->session()->flash('success', "$student->name has been deleted");
        return redirect()->route('students.index');

    }
}
