<?php

namespace App\Http\Controllers;

use App\Models\cours;
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
        $allcours = cours::all();
        return view('cours.create', compact('allcours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|integer|exists:cours,id',
        ]);

        cours::create($validatedData);

        return redirect()->route('cours.index');
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
        $cours = cours::findOrFail($id);
        return view('cours.update' ,compact('cours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'parent_id' => 'nullable|integer|exists:cours,id',
        ]);

        // dd($request->all());

        $cours = Cours::findOrFail($id);
        $cours->name = $request->input('name');
        $cours->description = $request->input('description');
        // $cours->parent_id = $request->input('parent_id');
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
