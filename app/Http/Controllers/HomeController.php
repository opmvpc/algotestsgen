<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $zipPath = public_path('storage/java.zip');
        $zipDispo = is_file($zipPath);

        return view('home', compact('zipPath', 'zipDispo'));
    }

    public function downloadZip()
    {
        return Storage::disk('public')->download('java.zip');
    }
}
