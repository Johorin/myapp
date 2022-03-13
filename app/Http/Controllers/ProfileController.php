<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index(){
        // $profile = Profile::all();
        // return view('edit_profile.edit')->with('profile_data', $profile);
        
        $bio = Profile::where('bio')->get();
        return view('edit_profile.edit')->with('bio', $bio);
    }
}
