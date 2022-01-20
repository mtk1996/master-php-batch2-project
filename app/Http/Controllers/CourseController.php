<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseComment;
use App\Models\CourseVideo;
use App\Models\Language;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function all(Request $request)
    {

        $course = Course::orderBy('id', 'desc')
            ->withCount('comment', 'video')->with('language');
        // return $course->get();

        if ($request->free) {
            $course->where('type', 'free');
        }

        if ($request->paid) {
            $course->where('type', 'paid');
        }

        //category
        if ($category_slug = $request->category) {
            $category = Category::where('slug', $category_slug)->first();
            if (!$category) {
                return redirect()->back()->with('error', 'Category Not Found');
            }
            $course->where('category_id', $category->id);
        }

        //language
        if ($language_slug = $request->language) {
            $language = Language::where('slug', $language_slug)->first();
            if (!$language) {
                return redirect()->back()->with('error', 'Language Not Found');
            }

            $course->whereHas('language', function ($q) use ($language) {
                $q->where('course_language.language_id', $language->id);
            });
        }

        //search
        if ($search = $request->search) {
            $course->where('title', 'like', "%$search%");
        }


        $course =  $course->paginate(9);
        //return $course;
        return view('course.all_course', compact('course'));
    }

    public function detail($slug)
    {
        $isActive = false;
        if (auth()->check()) {
            $checkPlan = StudentEnroll::where('user_id', auth()->id())->orderBy('id', 'desc')->first();
            if ($checkPlan) {
                if ($checkPlan->type === 'active') {
                    $isActive = true;
                }
            }
        }


        $course = Course::where('slug', $slug)
            ->with('language', 'category', 'video', 'comment.user')
            ->withCount('comment')
            ->first();
        //return $course;
        if (!$course) {
            return redirect()->back()->with('error', 'Course Not Found');
        }
        return view('course.course_detail', compact('course', 'isActive'));
    }

    public function showCourseVideo($slug)
    {
        ///check course
        $course_video = CourseVideo::where('slug', $slug)->with('course.video')->first();
        if (!$course_video) {
            return redirect()->back()->with('error', 'Course video Not Found!');
        }


        $isActive = false;
        if (auth()->check()) {
            $checkPlan = StudentEnroll::where('user_id', auth()->id())->orderBy('id', 'desc')->first();
            if ($checkPlan) {
                if ($checkPlan->type === 'active') {
                    $isActive = true;
                }
            }
        }


        if ($course_video->course->type === 'free') {
            $isActive = true;
        }

        if (!$isActive) {
            return redirect('/plan')->with('error', 'Please Active One Plan');
        }

        // return $course_video;
        return view('course.course_video', compact('course_video', 'isActive'));
    }

    public function storeComment(Request $request)
    {
        // return $request->all();
        $course = Course::where('slug', $request->course_slug)->first();
        if (!$course) {
            return 'course_not_found';
        }
        CourseComment::create([
            'user_id' => auth()->user()->id,
            'course_id' => $course->id,
            'comment' => $request->comment,
        ]);
        return 'success';
    }
}
