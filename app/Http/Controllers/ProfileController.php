<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id) {
        // Retrieve the profile based on the id
        $profile = Profile::where('id', $id)->first();

        if (!$profile)
            abort(404);
        
        // Pass the profile data to a view or perform other actions
        return view('profile.show', ['profile' => $profile]);
    }
}
