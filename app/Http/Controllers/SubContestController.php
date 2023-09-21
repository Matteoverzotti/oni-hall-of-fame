<?php

namespace App\Http\Controllers;
use App\Models\Contest;

use Illuminate\Http\Request;

class SubContestController extends Controller
{
    public function show($name_id, $sub_contest_id) {
        // Retrieve the contest based on the name_id
        $contest = Contest::where('name_id', $name_id)->first();
    
        if (!$contest) {
            // Handle not found
            abort(404);
        }
    
        // Retrieve the sub_contest based on the sub_contest_id within the context of the contest
        $sub_contest = $contest->subContests()->where('name_id', $sub_contest_id)->first();
    
        if (!$sub_contest) {
            // Handle not found
            abort(404);
        }
    
        // Pass the contest and sub_contest data to a view or perform other actions
        return view('sub_contests.show', ['contest' => $contest, 'sub_contest' => $sub_contest]);
    }
}
