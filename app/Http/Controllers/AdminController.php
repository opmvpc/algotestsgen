<?php

namespace App\Http\Controllers;

use App\GenerateurCode\Generateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function genererCode()
    {
        $estOk = Generateur::makeZip();
    }
}
