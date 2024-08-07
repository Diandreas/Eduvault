<?php

namespace App\Http\Controllers;

use App\Models\SchoolHasGrade;
use Illuminate\Http\Request;

class SchoolHasGradeController extends Controller
{
    public function index()
    {
        $schoolHasGrades = SchoolHasGrade::all();
        return view('school_has_grades.index', compact('schoolHasGrades'));
    }

    public function create()
    {
        return view('school_has_grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'school_country_id' => 'required|exists:countries,id',
            'grade_id' => 'required|exists:grades,id',
        ]);

        SchoolHasGrade::create($request->all());

        return redirect()->route('school_has_grades.index')->with('success', 'SchoolHasGrade created successfully.');
    }

    public function show(SchoolHasGrade $schoolHasGrade)
    {
        return view('school_has_grades.show', compact('schoolHasGrade'));
    }

    public function edit(SchoolHasGrade $schoolHasGrade)
    {
        return view('school_has_grades.edit', compact('schoolHasGrade'));
    }

    public function update(Request $request, SchoolHasGrade $schoolHasGrade)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'school_country_id' => 'required|exists:countries,id',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $schoolHasGrade->update($request->all());

        return redirect()->route('school_has_grades.index')->with('success', 'SchoolHasGrade updated successfully.');
    }

    public function destroy(SchoolHasGrade $schoolHasGrade)
    {
        $schoolHasGrade->delete();

        return redirect()->route('school_has_grades.index')->with('success', 'SchoolHasGrade deleted successfully.');
    }
}
