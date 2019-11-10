<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $zipPath = public_path('storage/test.zip');
        $zipDispo = is_file($zipPath);

        $testCount = Test::stats();

        return view('home', compact('zipPath', 'zipDispo', 'testCount'));
    }

    public function commentCaMarche()
    {
        return view('faq');
    }

    public function downloadZip()
    {
        return Storage::disk('public')->download('test.zip');
    }
}
