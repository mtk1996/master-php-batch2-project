<?php

namespace App\Http\Middleware;

use App\Models\StudentEnroll;
use Closure;
use Illuminate\Http\Request;

class CheckPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $today = date('Y-m-d');  //2022-01-20
            $enroll = StudentEnroll::where('type', 'active')
                ->where('user_id', auth()->id());
            if ($enroll->first()) {
                $expire_date = $enroll->first()->expire_date; //2022-02-04
                if ($today >= $expire_date) {
                    $enroll->update([
                        'type' => "expire"
                    ]);
                }
            }
        }
        return $next($request);
    }
}
