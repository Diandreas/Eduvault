<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\School;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        $courses = Course::all();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $courses = Course::all();
        $schools = School::all();
        return view('documents.create', compact('courses','schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'path' => 'required|string|max:250',
            'format' => 'required|string|max:10',
            'size' => 'required|string|max:100',
            'create_at' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'school_id' => 'required|exists:schools,id',
            'grade_id' => 'required|exists:grades,id',
            'documents_id' => 'required|exists:documents,id',
            'documents_course_id' => 'required|exists:courses,id',
            'documents_school_id' => 'required|exists:schools,id',
            'documents_grade_id' => 'required|exists:grades,id',
            'period_id' => 'required|exists:periods,id',
        ]);

        Document::create($request->all());

        return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'path' => 'required|string|max:250',
            'format' => 'required|string|max:10',
            'size' => 'required|string|max:100',
            'create_at' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'school_id' => 'required|exists:schools,id',
            'grade_id' => 'required|exists:grades,id',
            'documents_id' => 'required|exists:documents,id',
            'documents_course_id' => 'required|exists:courses,id',
            'documents_school_id' => 'required|exists:schools,id',
            'documents_grade_id' => 'required|exists:grades,id',
            'period_id' => 'required|exists:periods,id',
        ]);

        $document->update($request->all());

        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }
}
