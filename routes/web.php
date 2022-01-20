<?php

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('/course', 'CourseController@all');
Route::get('/course/{slug}', 'CourseController@detail');
Route::get('/course-video/{slug}', 'CourseController@showCourseVideo');

Route::get('/plan', 'PageController@showPlan');


Route::group(['middleware' => 'auth'], function () {
    Route::post('course-comment', 'CourseController@storeComment');

    Route::get('/active-plan/{slug}', 'PageController@showPaymentForm');
    Route::post('/active-plan/{slug}', 'PageController@storePaymentForm');
});

Route::get('/login', function () {
    $cre = ['email' => 'userone@a.com', 'password' => 'userone'];
    if (auth()->attempt($cre)) {
        return auth()->user();
    }
})->name('login');

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/')->with('success', 'Logout');
});


Route::get('/admin/login/', 'Admin\AuthController@showLogin');
Route::post('/admin/login', 'Admin\AuthController@postLogin');

Route::group(['prefix' => "admin", 'namespace' => "Admin", 'middleware' => "AdminAuth"], function () {
    Route::get('/', 'PageController@home');
    Route::resource('/language', 'LanguageController');
    Route::resource('/category', 'CategoryController');
    Route::resource('article', 'ArticleController');

    Route::resource('course', 'CourseController');
    Route::resource('course-video', 'CourseVideoController');

    Route::resource('pricing', 'PricingController');

    Route::get('/logout', 'AuthController@logout');
});


Route::get('/test', function () {
    return Course::where('id', 4)->withCount('video')->with('video')->first();
});

// {
//     //
//     title : 'laravel react',
//     description : '',
//     like_count : '',
//     course_videos:[
//         {title:'basic laravel',},{title:'basic react'}
//     ]
// }
