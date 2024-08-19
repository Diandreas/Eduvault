<?php

namespace App\Imports;

use App\Models\period;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeriodsImports implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Vérifier si la ligne est vide en vérifiant les champs essentiels
        // if (empty($row['name']) || empty($row['description']) || empty($row['periodcol'])) {
        //     return null;
        // }
        // Vérifier si la colonne 'periodcol' est numérique


        // Vérifier si le période existe déjà
        $existingPeriod = period::where('name', $row['name'])->first();

         //Aussi Vérifier si la ligne est vide en vérifiant les champs essentiels
        if ($existingPeriod || 
        (empty($row['name']) || empty($row['description']) || empty($row['periodcol']))
        ||(!is_numeric($row['periodcol']))) {

            return null;
        }
        // sinon
        return new period([
            'name' => $row['name'],
            'description' => $row['description'],
            'periodcol' => $row['periodcol'],
        ]);
    }
}
