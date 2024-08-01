<?php

namespace App\Imports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CountriesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Vérifier si le pays existe déjà
        $existingCountry = Country::where('name', $row['name'])->first();

        if ($existingCountry) {
            // Si le pays existe déjà, ne rien faire (ignorer la ligne)
            return null;
        }
        // Sinon, créer un nouveau pays
        return new Country([
            'name' => $row['name'],
            'abbr' => $row['abbr'],
        ]);
    }
}
