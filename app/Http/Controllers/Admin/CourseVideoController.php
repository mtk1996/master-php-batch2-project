<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::find(request()->course_id);

        if ($course) {
            $course_videos = CourseVideo::orderBy('id', 'desc')
                ->where('course_id', $course->id)
                ->get();
            return view('admin.course-video.index', compact('course', 'course_videos'));
        }
        return redirect()->back()->with('error', 'Course Id Not Found!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::find(request()->course_id);
        if ($course) {
            return view('admin.course-video.create', compact('course'));
        }
        return redirect()->back()->with('error', 'Course Id Not Found!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::find(request()->course_id);
        if ($course) {
            CourseVideo::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'course_id' => $course->id,
                'video_url' => $request->video_url,
            ]);
            return redirect()->back()->with('success', 'Course Video Created Success');
        }
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
        $course = Course::find(request()->course_id);
        $course_video = CourseVideo::find($id);
        if ($course) {
            return view('admin.course-video.edit', compact('course', 'course_video'));
        }
        return redirect()->back()->with('error', 'Course Id Not Found!');
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
        $course = Course::find(request()->course_id);
        if ($course) {
            CourseVideo::where('id', $id)->update([
                'title' => $request->title,
                'video_url' => $request->video_url,
            ]);
            return redirect()->back()->with('success', 'Course Video Updated Success!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseVideo::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Course Video Deleted Success!');
    }
}
