<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StudentEnrollController extends Controller
{
    public function showAll()
    {
        $enroll = StudentEnroll::orderBy('id', 'desc')->with('user', 'pricing');

        if (request()->pending) {
            $enroll->where('type', 'pending');
        }

        $enroll = $enroll->paginate(10);

        return view('admin.enroll.enroll', compact('enroll'));
    }

    public function setActive($id)
    {
        $enroll = StudentEnroll::where('id', $id);

        $start_date = date('Y-m-d'); //str

        $expire_date = Carbon::parse($start_date)->addDays($enroll->first()->learn_date)->format('Y-m-d');

        $enroll->update([
            'type' => "active",
            'start_date' => $start_date,
            'expire_date' => $expire_date,
        ]);
        return redirect()->back()->with('success', 'Activated!');
    }
}
