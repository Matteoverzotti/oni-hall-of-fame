<?php

namespace App\Http\Controllers;
use App\Models\Contest;

class ContestController extends Controller
{
    public function show($name_id) {
        // Retrieve the contest based on the name_id
        $contest = Contest::where('name_id', $name_id)->first();

        if (!$contest) {
            // Handle not found (e.g., show a 404 page)
            abort(404);
        }
        
        // Pass the contest data to a view or perform other actions
        return view('contest.show', ['contest' => $contest]);
    }
}
