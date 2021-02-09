<?php

namespace App\Http\Controllers;

use App\cvDesign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $designs = cvDesign::get();
        
        return view('welcome', compact(
                'designs',
            )
        );
    }
}
