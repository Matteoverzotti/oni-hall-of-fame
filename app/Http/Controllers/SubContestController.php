<?php

namespace App\Http\Controllers;
use App\Models\Contest;

use App\Models\Ranking;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubContestController extends Controller
{
    // Retrieve the contest based on the name_id
    private function getSubContest($name_id, $sub_contest_id) {
        $contest = Contest::where('name_id', $name_id)->first();
        if (!$contest)
            abort(404);

        $sub_contest = $contest->subContests()->where('name_id', $sub_contest_id)->first();
        if (!$sub_contest)
            abort(404);

        return [$contest, $sub_contest];
    }

    // TODO: Add mapping for the sub_contest to contestants
    // On update/delete, must remake the mapping

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

        // Name update
        if (request()->input('name') == '')
            return redirect()
                ->back()
                ->withErrors(['name' => 'Name cannot be empty'])
                ->withInput();

        // Make sure there are no other subcontests with the same name within this contest
        $existing_sub_contest = $contest->subContests()->where('name', request()->input('name'))->first();
        if ($existing_sub_contest && $existing_sub_contest->id != $sub_contest->id)
            return redirect()->back()->withErrors(['name' => 'SubContest with this name already exists'])->withInput();

        $sub_contest->update([
            'name' => request()->input('name'),
        ]);

        // Process the ranking csv
        if (request()->hasFile('ranking')) {
            $ranking_csv = request()->file('ranking');

             $rankingModel = $sub_contest->rankings()->first();
             if (!$rankingModel) {
                 $rankingModel = new Ranking();
                 $rankingModel->subContest()->associate($sub_contest);
             }
             $rankingModel->data = json_encode($this->parseCsv($ranking_csv->getRealPath()));
             $rankingModel->save();


            // Associate the ranking with the sub_contest
            $sub_contest->rankings()->save($rankingModel);
        }

        return redirect("/contest/{$contest->name_id}/{$sub_contest->name_id}")->with('success', 'Subcontest updated successfully!');
    }

    private function parseCsv($filePath) {
        $csvContent = file_get_contents($filePath);
        $csvRows = str_getcsv($csvContent, "\n");

        $result = [];
        foreach ($csvRows as $row)
            $result[] = str_getcsv($row);

        return $result;
    }
}
