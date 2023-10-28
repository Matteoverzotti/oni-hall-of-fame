<?php

namespace App\Http\Controllers;
use App\Models\Contest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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

    // Show a create form
    public function create() {
        return view('contests.create');
    }

    // Store listing data
    public function store(Request $request) {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'date' => ['required', 'date'],
        ]);

        try {
            Contest::create($formFields);
            return redirect('/')->with('message', 'Contest created successfully!');
        } catch (QueryException $e) {
            // Handle duplicate entry error
            return redirect()->back()->withErrors(['name' => 'A contest with this name already exists.'])->withInput();
        }
    }
}
