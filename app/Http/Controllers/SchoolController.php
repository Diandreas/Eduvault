<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $schools = School::paginate();

        return view('school.index', compact('schools'))
            ->with('i', ($request->input('page', 1) - 1) * $schools->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $school = new School();
        $countries = Country::all();
        return view('school.create', compact('school'), compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request): RedirectResponse
    {
        // Validation et enregistrement de l'image
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        School::create($data);

        return Redirect::route('school.index')
            ->with('success', 'School created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $school = School::find($id);

        return view('school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $school = School::find($id);
        $countries = Country::all();
        return view('school.edit', compact('school'), compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, School $school): RedirectResponse
    {
        // Validation et mise à jour de l'image
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($school->image) {
                Storage::disk('public')->delete($school->image);
            }

            // Enregistrer la nouvelle image
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $school->update($data);

        return Redirect::route('school.index')
            ->with('success', 'School updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $school = School::find($id);

        // Supprimer l'image associée si elle existe
        if ($school->image) {
            Storage::disk('public')->delete($school->image);
        }

        $school->delete();

        return Redirect::route('school.index')
            ->with('success', 'School deleted successfully');
    }
}
