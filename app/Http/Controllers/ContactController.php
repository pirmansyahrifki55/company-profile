<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     public function index(){
        $profile = CompanyProfile::first();
        return view('pages.contact', compact('profile'));
    }
}
