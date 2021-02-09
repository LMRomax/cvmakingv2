<?php

namespace App\Http\Controllers;

use App\cvDesign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $designs = cvDesign::get();
        
        return view('welcome', compact(
                'designs',
            )
        );
    }
}
