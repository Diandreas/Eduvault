<?php

namespace App\Imports;

use App\Models\profession;
use Maatwebsite\Excel\Concerns\ToModel;

class ProfessionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          // Vérifier si le profession existe déjà
          $existingProfession = profession::where('name', $row['name'])->first();

          //Aussi Vérifier si la ligne est vide en vérifiant les champs essentiels
         if ($existingProfession|| empty($row['name'])) {
 
             return null;
         }
        return new profession([
            'name' => $row['name'],
        ]);
    }
}
