<?php

namespace App\Http\Controllers;

use App\Models\Schoollevel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SchoollevelRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SchoollevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $schoollevels = Schoollevel::paginate();

        return view('schoollevel.index', compact('schoollevels'))
            ->with('i', ($request->input('page', 1) - 1) * $schoollevels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $schoollevel = new Schoollevel();

        return view('schoollevel.create', compact('schoollevel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoollevelRequest $request): RedirectResponse
    {
        Schoollevel::create($request->validated());

        return Redirect::route('schoollevel.index')
            ->with('success', 'Schoollevel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $schoollevel = Schoollevel::find($id);

        return view('schoollevel.show', compact('schoollevel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $schoollevel = Schoollevel::find($id);

        return view('schoollevel.edit', compact('schoollevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoollevelRequest $request, Schoollevel $schoollevel): RedirectResponse
    {
        $schoollevel->update($request->validated());

        return Redirect::route('schoollevel.index')
            ->with('success', 'Schoollevel updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Schoollevel::find($id)->delete();

        return Redirect::route('schoollevel.index')
            ->with('success', 'Schoollevel deleted successfully');
    }
}
