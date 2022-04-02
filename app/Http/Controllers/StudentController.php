<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Notifications\StudentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::first();
        Notification::send($student, new StudentNotification);
        dd('done');
        return view('backend.main');
    }
}
