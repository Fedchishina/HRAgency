<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{
    public function showConsulting(){
        return view('services-consulting');
    }

    public function showRecruitment(){
        return view('services-recruitment');
    }

    public function showStaffing(){
        return view('services-staffing');
    }
}
