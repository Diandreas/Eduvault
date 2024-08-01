<?php

namespace App\Http\Controllers;

use App\Models\cours;
use App\Models\Schoollevel;
use App\Models\Schoollevelscour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SchoollevelscourRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SchoollevelscourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $schoollevelscours = Schoollevelscour::with(['schoollevel', 'cours'])->paginate(10);

        return view('schoollevelscour.index', compact('schoollevelscours'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $schoollevelscour = new Schoollevelscour();
        $schoollevels = Schoollevel::all();
        $courses = Cours::all();

        return view('schoollevelscour.create', compact('schoollevelscour','schoollevels','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoollevelscourRequest $request): RedirectResponse
    {
        Schoollevelscour::create($request->validated());

        return Redirect::route('schoollevelscours.index')
            ->with('success', 'Schoollevelscour created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $schoollevelscour = Schoollevelscour::find($id);

        return view('schoollevelscour.show', compact('schoollevelscour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $schoollevelscour = Schoollevelscour::find($id);
        $schoollevels = Schoollevel::all();
        $courses = Cours::all();
        return view('schoollevelscour.edit', compact('schoollevelscour','schoollevels','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoollevelscourRequest $request, Schoollevelscour $schoollevelscour): RedirectResponse
    {
        $schoollevelscour->update($request->validated());

        return Redirect::route('schoollevelscours.index')
            ->with('success', 'Schoollevelscour updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Schoollevelscour::find($id)->delete();

        return Redirect::route('schoollevelscours.index')
            ->with('success', 'Schoollevelscour deleted successfully');
    }
}
