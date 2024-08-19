<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Document;
use App\Models\Grade;
use App\Models\Period;
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
        $grades = Grade::all();
        $documents = Document::all();
        $periods = Period::all();
        return view('documents.create', compact('courses', 'schools', 'grades', 'documents', 'periods'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240', // 10MB max
            'course_id' => 'required|exists:courses,id',
            'school_id' => 'required|exists:schools,id',
            'grade_id' => 'required|exists:grades,id',
            'period_id' => 'required|exists:periods,id',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            $document = new Document();
            $document->name = $request->name;
            $document->path = $filePath;
            $document->format = $file->getClientOriginalExtension();
            $document->size = $file->getSize();
            $document->course_id = $request->course_id;
            $document->school_id = $request->school_id;
            $document->grade_id = $request->grade_id;
            $document->period_id = $request->period_id;
            $document->save();

            return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
        }

        return back()->with('error', 'Failed to upload document.');
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
    public function home()
    {
        $courses = Course::all();
        $schools = School::all();
        $grades = Grade::all();
        $periods = Period::all();
        $documents = Document::all();
        return view('home', compact('courses', 'schools', 'grades', 'periods', 'documents'));
    }

    public function search(Request $request)
    {
        $query = Document::query();

        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->filled('school_id')) {
            $query->where('school_id', $request->school_id);
        }

        if ($request->filled('period_id')) {
            $query->where('period_id', $request->period_id);
        }

        if ($request->filled('grade_id')) {
            $query->where('grade_id', $request->grade_id);
        }

        $documents = $query->get();

        return view('documents.search_results', compact('documents'));
    }
    public function download(Document $document)
    {
        $path = storage_path('app/public/' . $document->path);
        return response()->download($path, $document->name . '.' . $document->format);
    }
}
