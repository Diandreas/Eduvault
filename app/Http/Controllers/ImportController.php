<?php

namespace App\Http\Controllers;

use App\Imports\CountriesImport;
use App\Imports\PeriodsImports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{
    //
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new CountriesImport, $request->file('file'));

        return redirect()->route('country.index')->with('success', 'Countries imported successfully.');
    }

    public function importPeriod(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new PeriodsImports, $request->file('file'));
         
        return redirect()->route('periods.index')->with('success', 'Countries imported successfully.');
    }
}
