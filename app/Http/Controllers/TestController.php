<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Probleme;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\TestIndexRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TestIndexRequest $request)
    {
        $tests = Test::with(['user', 'probleme'])
            ->orderBy('updated_at', 'desc')
            ->when($request->has('probleme'), function ($query) {
                $query->where('probleme_id', request()->probleme);
            })
            ->when($request->has('recherche'), function ($query) {
                $query->where('nom', 'LIKE', '%'.request()->recherche.'%')
                ->orWhereHas('user', function ($query) {
                    $query->where('name', 'LIKE', '%'.request()->recherche.'%');
                });
            })
            ->paginate(6);

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $problemes = Probleme::pluck('nom', 'id');

        return view('tests.create', compact('problemes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestRequest $request)
    {
        $datas = $request->all();
        $test = Test::create($datas);
        $test->resultat = $datas['resultat'] == null ? 'null' : $datas['resultat'];
        $test->user_id = $request->user()->id;
        $test->save();

        return redirect()
            ->route('tests.index')
            ->withOk('Votre proposition a été enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        if (! Gate::allows('update-test', $test)) {
            return redirect()
            ->route('tests.index');
        }

        $problemes = Probleme::pluck('nom', 'id');

        return view('tests.edit', compact('test', 'problemes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(TestRequest $request, Test $test)
    {
        if (! Gate::allows('update-test', $test)) {
            return redirect()
            ->route('tests.index');
        }

        $datas = $request->all();
        $test->update($datas);
        $test->resultat = $datas['resultat'] == null ? 'null' : $datas['resultat'];
        $test->save();

        return redirect()
            ->back()
            ->withOk('Vos modifications ont été enregistrées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
