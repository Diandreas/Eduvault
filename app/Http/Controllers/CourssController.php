<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\cours;
use App\Models\ParentCourse;
use Illuminate\Http\Request;

class CourssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcours = cours::all();
        return view('cours.index', compact('allcours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = new cours();
        $parentCourse = ParentCourse::all();
        return view('cours.form', compact('course', 'parentCourse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $validatedData = $request->validated();
        cours::create($validatedData);

        return redirect()->route('cours.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = cours::findOrFail($id);
        $parentCourse = ParentCourse::all();
        return view('cours.form' ,compact('course', 'parentCourse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, string $id)
    {
        $cours = Cours::findOrFail($id);
        $cours->update($request->validated());
        $cours->save();

        return redirect()->route('cours.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        return redirect()->route('cours.index')->with('success', 'Cours deleted successfully');
    }
}
