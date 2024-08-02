<?php

namespace App\Http\Controllers;

use App\Models\cours;
use App\Models\Document;
use App\Models\School;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldocs = Document::all();
        return view('Document.index', compact('alldocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcours = cours::all();
        $allSchool = School::all();
        return view('Document.create', compact('allcours', 'allSchool'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string',
            'format' => 'required|string',
            'size' => 'required|string',
            'cours_id' => 'integer|exists:cours,id',
            'schools_id' => 'integer|exists:schools,id',
        ]);

        Document::create($validatedData);

        return redirect()->route('documents.index');
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
        $doc = Document::findOrFail($id);
        return view('Document.update' ,compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string',
            'format' => 'required|string',
            'size' => 'required|string',
        ]);

        $doc = Document::findOrFail($id);
        $doc->name = $request->input('name');
        $doc->path = $request->input('path');
        $doc->format = $request->input('format');
        $doc->size = $request->input('size');

        $doc->save();
        return redirect()->route('documents.index')->with('success', 'Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doc = Document::findOrFail($id);
        $doc->delete();
        return redirect()->route('documents.index')->with('success', 'Documents  deleted successfully');
    }
}
