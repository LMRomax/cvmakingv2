<?php

namespace App\Http\Middleware;

use App\Cv;
use Closure;
use Illuminate\Support\Carbon;

class deleteCV24Hours
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $all_cv = Cv::get();

        foreach($all_cv as $cv) {
            $differenceInDays = Carbon::parse(Carbon::now())->diffInDays($cv->updated_at);
            if($differenceInDays > 2) {
                if($cv->cvphoto != null) {
                    unlink(public_path().'/cvphoto/'.$cv->cvphoto);
                }
                $cv->delete();
            }
        }

        return $next($request);
    }
}
