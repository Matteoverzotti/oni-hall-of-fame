<?php

namespace App\Http\Controllers;
use App\Models\Contest;

class ContestController extends Controller
{
    public function index() {
        return view('contests.index', [
            'contests' => Contest::orderByDesc('date')->get()
        ]);
    }

    public function show($name_id) {
        // Retrieve the contest based on the name_id
        $contest = Contest::where('name_id', $name_id)->first();

        if (!$contest)
            abort(404);

        return view('contests.show', ['contest' => $contest]);
    }
}
