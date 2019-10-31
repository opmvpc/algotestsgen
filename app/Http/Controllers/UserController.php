<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')
            ->withCount('tests AS testCount')
            ->when($request->has('recherche'), function ($query) {
                $query->where('name', 'LIKE', '%' . request()->recherche . '%');
            })
            ->paginate(20);

        return view('users.index', compact('users'));
    }

    public function toggleAdmin(Request $request, User $user)
    {
        if ($user->is(request()->user())) {
            return redirect()->back()->withErrors('Il manquerait plus que ça! Et puis quoi encore?');
        }

        if ($user->est_admin) {
            $user->est_admin = false;
            $message = 'L\'utilisateur n\'est plus Administrateur';
        } else {
            $user->est_admin = true;
            $message = 'L\'utilisateur est maintenant Administrateur';
        }

        $user->save();

        return redirect()->back()->withOk($message);
    }

    public function toggleBannir(Request $request, User $user)
    {
        if ($user->is(request()->user())) {
            return redirect()->back()->withErrors('Il manquerait plus que ça! Et puis quoi encore?');
        }

        if ($user->est_banni) {
            $user->est_banni = false;
            $message = 'L\'utilisateur n\'est plus banni';
        } else {
            $user->est_banni = true;
            $message = 'L\'utilisateur est banni';
        }

        $user->save();

        return redirect()->back()->withOk($message);
    }

}
