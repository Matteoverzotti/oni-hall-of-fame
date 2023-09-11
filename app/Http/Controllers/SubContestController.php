<?php

namespace App\Http\Controllers;
use App\Models\SubContest;

use Illuminate\Http\Request;

class SubContestController extends Controller
{
    public function show($name_id, $subcontest_id) {
        // Retrieve the subcontest based on the name_id
        $subcontest = SubContest::where('name_id', $subcontest_id)->first();

        if (!$subcontest) {
            // Handle not found (e.g., show a 404 page)
            abort(404);
        }

        // Pass the contest data to a view or perform other actions
        return view('subcontest', ['subcontest' => $subcontest]);
    }
}
