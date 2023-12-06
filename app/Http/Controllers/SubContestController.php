<?php

namespace App\Http\Controllers;
use App\Models\Contest;

use Illuminate\Database\QueryException;
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

    // Delete SubContest
    public function destroy($name_id, $sub_contest_name_id) {
        // Retrieve the contest based on the name_id
        $contest = Contest::where('name_id', $name_id)->first();

        if (!$contest)
            abort(404);

        // Retrieve the sub_contest based on the sub_contest_id within the context of the contest
        $sub_contest = $contest->subContests()->where('name_id', $sub_contest_name_id)->first();

        if (!$sub_contest)
            abort(404);

        // Delete the sub_contest
        try {
            $sub_contest->delete();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error deleting subContest');
        }

        return redirect()
            ->route('contests.show', ['name_id' => $contest->name_id])
            ->with('success', 'SubContest deleted successfully!');
    }
}
