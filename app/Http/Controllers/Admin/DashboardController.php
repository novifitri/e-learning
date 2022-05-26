<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $admin = User::count();
        $students = Student::count();
        $teachers = Teacher::count();
        return view("admin.dashboard", compact("admin", "students", "teachers"));
    }
}
