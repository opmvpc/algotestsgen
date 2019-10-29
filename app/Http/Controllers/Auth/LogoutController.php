<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function logoutUser()
    {
        Auth::logout();

        return redirect('/');
    }
}
