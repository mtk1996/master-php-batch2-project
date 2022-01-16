<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course  = Course::orderBy('id', 'desc')->paginate(10);
        return view('admin.course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category  = Category::all();
        $language = Language::all();
        return view('admin.course.create', compact('category', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //upload
        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        Storage::disk('images')->put($file_name, file_get_contents($file));

        //course store
        $course = Course::create([
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'type' => $request->type,
            'image' => $file_name,
            'description' => $request->description,
            'like_count' => 0,
        ]);

        //pivot
        Course::find($course->id)->language()->sync($request->language_id);
        return redirect()->back()->with('success', 'Course Created Success');
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
        $language = Language::all();
        $category = Category::all();
        $course = Course::where('id', $id)->with('category', 'language')->first();

        return view('admin.course.edit', compact('course', 'language', 'category'));
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
        $course = Course::where('id', $id);
        if ($request->file('image')) {
            Storage::disk('images')->delete($course->first()->image);
            $file = $request->file('image');
            $file_name = uniqid() . $file->getClientOriginalName();
            Storage::disk('images')->put($file_name, file_get_contents($file));
        } else {
            $file_name = $course->first()->image;
        }

        $course->update([
            'slug' => Str::slug($request->title),
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'type' => $request->type,
            'image' => $file_name
        ]);

        Course::find($id)->language()->sync($request->language_id);
        return redirect()->back()->with('success', 'Course UPdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        Storage::disk('images')->delete($course->image);
        $course->delete();
        $course->language()->detach(); //sycn   detach
        return redirect()->back()->with('success', 'Course Deleted');
    }
}
