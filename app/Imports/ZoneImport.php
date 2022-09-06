<?php

namespace App\Imports;

use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToModel;

class ZoneImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Zone([
            'code_district' => $row[0],
            'code_zone' => $row[1],
            'name' => $row[2]
        ]);
    }
}
