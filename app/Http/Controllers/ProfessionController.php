<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index(Request $request)
    {
        // $professions = Profession::all();
        // return view('professions.index', compact('professions'));
        $search = $request->input('search');

        // Construire la requête de base
        $query = Profession::query();

        // Si un terme de recherche est fourni, appliquer le filtre
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Paginer les résultats (5 par page dans cet exemple)
        $professions = $query->paginate(5);

        // Calculer l'index pour l'affichage
        $currentPage = $request->input('page', 1);
        $perPage = 5;
        $i = ($currentPage - 1) * $perPage;

        // Retourner la vue avec les résultats paginés et le terme de recherche
        return view('professions.index', compact('professions', 'search', 'i'));
    }

    public function create()
    {
        return view('professions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Profession::create($request->all());

        return redirect()->route('professions.index')->with('success', 'Profession created successfully.');
    }

    public function show(Profession $profession)
    {
        return view('professions.show', compact('profession'));
    }

    public function edit(Profession $profession)
    {
        return view('professions.edit', compact('profession'));
    }

    public function update(Request $request, Profession $profession)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $profession->update($request->all());

        return redirect()->route('professions.index')->with('success', 'Profession updated successfully.');
    }

    public function destroy(Profession $profession)
    {
        $profession->delete();

        return redirect()->route('professions.index')->with('success', 'Profession deleted successfully.');
    }
}
