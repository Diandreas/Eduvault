<?php

namespace App\Http\Controllers;

use App\Models\ChronoHasDocument;
use Illuminate\Http\Request;

class ChronoHasDocumentController extends Controller
{
    public function index()
    {
        $chronoHasDocuments = ChronoHasDocument::all();
        return view('chrono_has_documents.index', compact('chronoHasDocuments'));
    }

    public function create()
    {
        return view('chrono_has_documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'chrono_id' => 'required|exists:chronos,id',
            'documents_id' => 'required|exists:documents,id',
            'documents_course_id' => 'required|exists:courses,id',
            'documents_school_id' => 'required|exists:schools,id',
            'documents_grade_id' => 'required|exists:grades,id',
            'status' => 'nullable|string|max:45',
        ]);

        ChronoHasDocument::create($request->all());

        return redirect()->route('chrono_has_documents.index')->with('success', 'ChronoHasDocument created successfully.');
    }

    public function show(ChronoHasDocument $chronoHasDocument)
    {
        return view('chrono_has_documents.show', compact('chronoHasDocument'));
    }

    public function edit(ChronoHasDocument $chronoHasDocument)
    {
        return view('chrono_has_documents.edit', compact('chronoHasDocument'));
    }

    public function update(Request $request, ChronoHasDocument $chronoHasDocument)
    {
        $request->validate([
            'chrono_id' => 'required|exists:chronos,id',
            'documents_id' => 'required|exists:documents,id',
            'documents_course_id' => 'required|exists:courses,id',
            'documents_school_id' => 'required|exists:schools,id',
            'documents_grade_id' => 'required|exists:grades,id',
            'status' => 'nullable|string|max:45',
        ]);

        $chronoHasDocument->update($request->all());

        return redirect()->route('chrono_has_documents.index')->with('success', 'ChronoHasDocument updated successfully.');
    }

    public function destroy(ChronoHasDocument $chronoHasDocument)
    {
        $chronoHasDocument->delete();

        return redirect()->route('chrono_has_documents.index')->with('success', 'ChronoHasDocument deleted successfully.');
    }
}
