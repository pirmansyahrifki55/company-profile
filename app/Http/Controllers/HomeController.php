<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $profile = CompanyProfile::first();
        return view('pages.home', compact('profile'));
    }
}
