<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index(Request $request)
    {
        $periods = Period::all();
        $search = $request->input('search');

        if($search)
        {
            $periods = Period::where('name','Like','%'.$search.'%')->get();
        }
        // else
        // {
        //     $periods = Period::all();
        // }
       
        return view('periods.index', compact('periods'));
    }

    public function create()
    {
        return view('periods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'periodcol' => 'nullable|string|max:45',
        ]);

        Period::create($request->all());

        return redirect()->route('periods.index')->with('success', 'Period created successfully.');
    }

    public function show(Period $period)
    {
        return view('periods.show', compact('period'));
    }

    public function edit(Period $period)
    {
        return view('periods.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'periodcol' => 'nullable|string|max:45',
        ]);

        $period->update($request->all());

        return redirect()->route('periods.index')->with('success', 'Period updated successfully.');
    }

    public function destroy(Period $period)
    {
        $period->delete();

        return redirect()->route('periods.index')->with('success', 'Period deleted successfully.');
    }
}
