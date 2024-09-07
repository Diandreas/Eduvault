<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;

class GradeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         // Vérifier si le période existe déjà
         $existingGrade = Grade::where('name', $row['name'])->first();

         //Aussi Vérifier si la ligne est vide en vérifiant les champs essentiels
        if ($existingGrade || 
        (empty($row['name']) || empty($row['description']) )) {

            return null;
        }
        return new Grade([
            'name' => $row['name'],
            'description' => $row['description'],
        ]);
    }
}
