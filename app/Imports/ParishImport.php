<?php

namespace App\Imports;

use App\Models\Parish;
use Maatwebsite\Excel\Concerns\ToModel;

class ParishImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Parish([
            'code_city' => $row[0],
            'code_parish' => $row[1],
            'name' => $row[2]
        ]);
    }
}
