<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article  = Article::orderBy('id', 'desc')->with('language', 'category')->paginate(10);

        return view('admin.article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $language = Language::all();
        return view('admin.article.create', compact('category', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        //article store
        //image upload
        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();

        Storage::disk('images')->put($file_name, file_get_contents($file));
        $article = Article::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $file_name,
            'like_count' => 0
        ]);

        //syc
        $article->language()->sync($request->language_id);
        return redirect()->back()->with('success', 'Article Created Success');
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
        $category = Category::all();
        $language = Language::all();
        $article = Article::where('id', $id)->with('category', 'language')->first();
        return view('admin.article.edit', compact('article', 'category', 'language'));
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
        $article = Article::where('id', $id);

        //image
        if ($request->file('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . $file->getClientOriginalName(); //new.png
            //upload
            Storage::disk('images')->put($file_name, file_get_contents($file));
            //delete
            Storage::disk('images')->delete($article->first()->image);
        } else {
            $file_name = $article->first()->image; //db.png
        }

        //updaet
        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $file_name,
        ]);
        //sync
        Article::find($article->first()->id)->language()->sync($request->language_id);

        //succes
        return redirect()->back()->with('success', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id);
        Storage::disk('images')->delete($article->first()->image);
        DB::table('article_language')->where('article_id', $id)->delete();
        $article->delete();
        return redirect()->back()->with('success', 'Article Deleted!');
    }
}
