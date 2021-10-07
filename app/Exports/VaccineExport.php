<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Vaccine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VaccineExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $vacuna = DB::table('vaccine')
        ->select('id',
                    'vaccine_d',
                    'date_e',
                    'date_c',
                    'supplier',
                    'actual_state')
                    ->Where('actual_state','=','ACTIVO')
        ->get();
        return $vacuna;
    }
    public function headings():array{
        return[
            'ID',
            'Nombre de la Vacuna',
            'Fecha de Elaboracion',
            'Fecha de Caducidad',
            'Proveedor',
            'Estado actual de la Información',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>22,
            'C'=>24,
            'D'=>15,
            'E'=>15, 
            'F'=>30,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
       $sheet->getStyle('A1')->getFont()->setBold(true);
       $sheet->getStyle('B1')->getFont()->setBold(true);
       $sheet->getStyle('C1')->getFont()->setBold(true);
       $sheet->getStyle('D1')->getFont()->setBold(true);
       $sheet->getStyle('E1')->getFont()->setBold(true);
       $sheet->getStyle('F1')->getFont()->setBold(true);
    }
}
