<?php

namespace App\Imports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;

class DistrictImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new District([            
            'code_state' => $row[0],
            'code_district' => $row[1],
            'name' => $row[2]
        ]);
    }
}
