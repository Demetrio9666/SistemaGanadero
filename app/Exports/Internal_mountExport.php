<?php

namespace App\Exports;

use App\Models\Internal_mount;
use Maatwebsite\Excel\Concerns\FromCollection;

class Internal_mountExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Internal_mount::all();
    }
}
