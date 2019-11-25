<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\GenerateurCode\Generateur;

class ApprouverTestController extends Controller
{
    public function approuver(Test $test)
    {
        $test->est_approuve = $test->est_approuve ? false : true;
        $test->save();

        $estOk = Generateur::makeZip();

        if ($estOk) {
            return redirect()->route('tests.show', $test)->withOk('Les fichiers ont été générés');
        }

        return redirect()->back()->withOk('Une erreur est survenue');
    }
}
