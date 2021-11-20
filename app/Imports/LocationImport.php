<?php

namespace App\Imports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Location([
           'location_d'     => $row['local'],
            'description'    => $row['desp'],
            'actual_state'   => $row['estado'],

            

            //'updated_at'=> $row[3],
            //'created_at' =>$row[4],
            
        ]);
    }
}
