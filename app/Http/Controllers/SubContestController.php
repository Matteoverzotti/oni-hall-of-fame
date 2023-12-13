<?php

namespace App\Http\Controllers;
use App\Models\Contest;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubContestController extends Controller
{
    // Retrieve the contest based on the name_id
    private function getSubContest($name_id, $sub_contest_id) {
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

        // return both contest and sub_contest
        return [$contest, $sub_contest];
    }

    public function show($name_id, $sub_contest_id) {
        [$contest, $sub_contest] = $this->getSubContest($name_id, $sub_contest_id);
        return view('sub_contests.show', ['contest' => $contest, 'sub_contest' => $sub_contest]);
    }

    // Delete SubContest
    public function destroy($name_id, $sub_contest_name_id) {
        [$contest, $sub_contest] = $this->getSubContest($name_id, $sub_contest_name_id);

        // Delete the sub_contest
        try {
            $sub_contest->delete();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error deleting subcontest');
        }

        return redirect()
            ->route('contests.show', ['name_id' => $contest->name_id])
            ->with('success', 'SubContest deleted successfully!');
    }

    public function edit($name_id, $sub_contest_name_id) {
        [$contest, $sub_contest] = $this->getSubContest($name_id, $sub_contest_name_id);
        return view('sub_contests.edit', ['contest' => $contest, 'sub_contest' => $sub_contest]);
    }

    // Update listing data
    public function update($name_id, $sub_contest_name_id) {
        [$contest, $sub_contest] = $this->getSubContest($name_id, $sub_contest_name_id);

        // Handle empty input
        if (request()->input('name') == '') {
            return redirect()->back()->withErrors(['name' => 'Name cannot be empty'])->withInput();
        }

        // Make sure there are no other subcontests with the same name within this contest
        $existing_sub_contest = $contest->subContests()->where('name', request()->input('name'))->first();
        if ($existing_sub_contest && $existing_sub_contest->id != $sub_contest->id) {
            return redirect()->back()->withErrors(['name' => 'SubContest with this name already exists'])->withInput();
        }

        $sub_contest->update([
            'name' => request()->input('name'),
        ]);

        return redirect("/contest/{$contest->name_id}/{$sub_contest->name_id}")->with('success', 'Subcontest updated successfully!');
    }
}
