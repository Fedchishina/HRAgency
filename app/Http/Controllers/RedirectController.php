<?php

namespace App\Http\Controllers;

class RedirectController extends Controller
{
    public function redirectAway($where){
        if ($where == 'facebook') {
            return response()->redirectTo('http://www.facebook.com/sviatoslav.voitenko');
        } else return;
    }
}
