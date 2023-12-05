<?php

namespace App\Http\Controllers;
use App\Models\Contest;
use App\Models\SubContest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContestController extends Controller
{
    // Show all contests
    public function index() {
        return view('contests.index', [
            'contests' => Contest::orderByDesc('date')->get()
        ]);
    }

    // Show individual contest
    public function show($name_id) {
        // Retrieve the contest based on the name_id
        $contest = Contest::where('name_id', $name_id)->first();

        if (!$contest)
            abort(404);

        return view('contests.show', ['contest' => $contest]);
    }

    // Show Create form
    public function create() {
        return view('contests.create');
    }

    // Show Edit form
    public function edit($contest_name) {
        $contest = Contest::where('name_id', $contest_name)->first();
        return view('contests.edit', ['contest' => $contest]);
    }

    // Update listing data
    public function update($contest_name) {
        // dd(request()->input());
        $contest = Contest::where('name_id', $contest_name)->first();

        if (!$contest)
            abort(404);

        $contestRules = [
            'name' => 'required',
            'location' => 'required',
            'date' => ['required', 'date'],
        ];

        $subContestRules = [
            'subcontests.*' => 'required',
        ];
        
        $rules = array_merge($contestRules, $subContestRules);
        $validator = Validator::make(request()->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        // Handle duplicate entry error
        try {
            $contest->update([
                'name' => request()->input('name'),
                'location' => request()->input('location'),
                'date' => request()->input('date'),
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['name' => 'A contest with this name already exists.'])->withInput();
        }

        if (request()->has('subcontests')) {
            $subContestData = request()->input('subcontests');
            
            if (count($subContestData) !== count(array_unique($subContestData))) {
                return redirect()->back()->withErrors(['subcontests' => 'Subcontest names must be unique.'])->withInput();
            }

            // Update existing subcontests if they exist
            foreach ($subContestData as $subContestName) {
                $subContest = $contest->subcontests()->where('name', $subContestName)->first();

                if ($subContest) {
                    $subContest->update([
                        'name' => $subContestName,
                        'location' => $contest->location,
                        'date' => $contest->date,
                    ]);
                }
            }

            foreach ($subContestData as $subContestName) {
                // Check if subcontest already exists
                $existingSubContest = $contest->subcontests()->where('name', $subContestName)->first();

                if (!$existingSubContest) {
                    $contest->subcontests()->create([
                        'name' => $subContestName,
                        'location' => $contest->location,
                        'date' => $contest->date,
                    ]);
                }
            }
        }

        return back()->with('success', 'Contest updated successfully!');
    }

    // Store listing data
    public function store(Request $request) {
        $contestRules = [
            'name' => 'required',
            'location' => 'required',
            'date' => ['required', 'date'],
        ];

        $subContestRules = [
            'subcontests.*' => 'required|unique:sub_contests,name',
        ];

        $rules = array_merge($contestRules, $subContestRules);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle duplicate entry error
        try {
            $contest = Contest::create([
                'name' => $request->input('name'),
                'location' => $request->input('location'),
                'date' => $request->input('date'),
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['name' => 'A contest with this name already exists.'])->withInput();
        }

        if ($request->has('subcontests')) {
            $subContestData = $request->input('subcontests');

            foreach ($subContestData as $subContestName) {
                $contest->subcontests()->create([
                    'name' => $subContestName,
                    'location' => $contest->location,
                    'date' => $contest->date,
                ]);
            }
        }

        return redirect('/')->with('success', 'Contest created successfully!');
    }
}
