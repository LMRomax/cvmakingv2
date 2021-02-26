<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class errorController extends Controller
{
    public function notAuthorized() {
        abort(403);
    }
}
