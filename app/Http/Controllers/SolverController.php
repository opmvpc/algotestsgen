<?php

namespace App\Http\Controllers;

use App\Solver;
use App\Models\Probleme;
use Illuminate\Support\Str;
use App\Http\Requests\SolverRequest;

class SolverController extends Controller
{
    public function __construct() {

    }

    public function solve(SolverRequest $request)
    {
        $probleme = Probleme::find($request->get('probleme'))->nom;
        $probleme = Str::slug($probleme);
        $input = $request->get('input');
        // dump($input);
        $result = (new Solver($probleme, $input))->solve();
        // dump($result);

        return response()->json(['result' => $result]);
    }
}
