<?php

namespace App\Http\Controllers;

use App\Models\Chrono;
use Illuminate\Http\Request;

class ChronoController extends Controller
{
    public function index(Request $request)
    {
        $chronos = Chrono::all();
        $search = $request->input('search');

        if($search)
        {
            $chronos = Chrono::where('name','Like','%'.$search.'%')->get();
        }

        return view('chronos.index', compact('chronos'));
    }

    public function create()
    {
        return view('chronos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Chrono::create($request->all());

        return redirect()->route('chronos.index')->with('success', 'Chrono created successfully.');
    }

    public function show(Chrono $chrono)
    {
        return view('chronos.show', compact('chrono'));
    }

    public function edit(Chrono $chrono)
    {
        return view('chronos.edit', compact('chrono'));
    }

    public function update(Request $request, Chrono $chrono)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $chrono->update($request->all());

        return redirect()->route('chronos.index')->with('success', 'Chrono updated successfully.');
    }

    public function destroy(Chrono $chrono)
    {
        $chrono->delete();

        return redirect()->route('chronos.index')->with('success', 'Chrono deleted successfully.');
    }
}
