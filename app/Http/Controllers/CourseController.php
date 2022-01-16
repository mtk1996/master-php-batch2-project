<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function all()
    {
        return view('course.all_course');
    }

    public function detail($slug)
    {
        return view('course.course_detail');
    }
}
