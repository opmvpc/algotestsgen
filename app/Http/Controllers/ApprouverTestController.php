<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class ApprouverTestController extends Controller
{
    public function approuver(Test $test)
    {
        $test->est_approuve = $test->est_approuve ? false : true;
        $test->save();

        return redirect()
            ->back()
            ->withOk('Vos modifications ont été enregistrées');
    }
}
