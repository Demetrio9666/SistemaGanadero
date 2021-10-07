<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LocationExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ubicacion = DB::table('location')
                    ->select('location.id',
                    'location.location_d',
                    'location.description',
                    'location.actual_state')
                    ->where('location.actual_state','=','ACTIVO')
                    ->get();
        return $ubicacion;
    }
    public function headings():array{
        return[
            'ID',
            'Localizacion',
            'Descripcion',
            'Estado actual de la Información',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>13,
            'C'=>18,
            'D'=>30,         
        ];
    }
    public function styles(Worksheet $sheet)
    {
       $sheet->getStyle('A1')->getFont()->setBold(true);
       $sheet->getStyle('B1')->getFont()->setBold(true);
       $sheet->getStyle('C1')->getFont()->setBold(true);
       $sheet->getStyle('D1')->getFont()->setBold(true);
    }

}
