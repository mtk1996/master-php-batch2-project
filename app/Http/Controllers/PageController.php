<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use App\Models\Pricing;
use App\Models\StudentEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $course = Course::orderBy('id', 'desc')->withCount('comment', 'video')
            ->paginate(6);
        $article = Article::orderBy('id', 'desc')->withCount('comment')
            ->paginate(6);
        return view('index', compact('course', 'article'));
    }

    public function showPlan()
    {
        $pricing = Pricing::all();
        return view('pricing', compact('pricing'));
    }
    public function showPaymentForm($slug)
    {
        $pricing = Pricing::where('slug', $slug)->first();
        if (!$pricing) {
            return redirect()->back()->with('error', 'Pricing Not Found');
        }
        return view('pricing.payment-form', compact('pricing'));
    }

    public function storePaymentForm(Request $request, $slug)
    {
        $pricing = Pricing::where('slug', $slug)->first();

        if (!$pricing) {
            return redirect()->back()->with('error', 'Pricing Not Found');
        }

        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        Storage::disk('images')->put($file_name, file_get_contents($file));
        StudentEnroll::create([
            'user_id' => auth()->id(),
            'pricing_id' => $pricing->id,
            'learn_date' => $pricing->learn_date,
            'payment_image' => $file_name,
        ]);
        return redirect('/')->with('success', 'Please Wait About 24 hours');
    }

    public function showDashboard()
    {
        $enroll = StudentEnroll::where('user_id', auth()->id())
            ->with('pricing')
            ->orderBy('id', 'desc')->paginate(10);

        return view('dashboard', compact('enroll'));
    }
}
