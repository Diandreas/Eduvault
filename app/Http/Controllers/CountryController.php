<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        
        $search = $request->input('search');

        // Construire la requête de base
        $query = Country::query();

        // Si un terme de recherche est fourni, appliquer le filtre
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Paginer les résultats (5 par page dans cet exemple)
        $countries = $query->paginate(5);

        // Calculer l'index pour l'affichage
        $currentPage = $request->input('page', 1);
        $perPage = 5;
        $i = ($currentPage - 1) * $perPage;

        // Retourner la vue avec les résultats paginés et le terme de recherche
        return view('country.index', compact('countries', 'search', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $country = new Country();

        return view('country.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request): RedirectResponse
    {
        Country::create($request->validated());

        return Redirect::route('country.index')
            ->with('success', 'Country created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $country = Country::find($id);

        return view('country.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $country = Country::find($id);

        return view('country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());

        return Redirect::route('country.index')
            ->with('success', 'Country updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Country::find($id)->delete();

        return Redirect::route('country.index')
            ->with('success', 'Country deleted successfully');
    }

    
}
