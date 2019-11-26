<?php

namespace App\Http\Controllers;

use App\Solver;
use App\Models\Probleme;
use Illuminate\Support\Str;
use App\Http\Requests\SolverRequest;

class SolverController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function solve(SolverRequest $request)
    {
        $probleme = $request->get('probleme');
        $input = $request->get('input');
        $result = (new Solver($probleme, $input))->solve();

        return response()->json(['result' => $result]);
    }
}
