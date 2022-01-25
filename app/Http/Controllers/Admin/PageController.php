<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        StudentEnroll::whereMonth('created_at', '3')->get();
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] =  StudentEnroll::whereMonth('created_at', "$i")->count();
        }
        return view('admin.home', compact('data'));
    }
}
