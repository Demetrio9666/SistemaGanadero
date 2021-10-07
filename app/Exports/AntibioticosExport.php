<?php

namespace App\Exports;

use App\Models\Antibiotic;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AntibioticosExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $anti = DB::table('antibiotic')
        ->select('antibiotic.id',
                  'antibiotic.antibiotic_d',
                  'antibiotic.date_e',
                  'antibiotic.date_c',
                  'antibiotic.supplier',
                  'antibiotic.actual_state')
                  ->where('antibiotic.actual_state','=','ACTIVO')
       ->get();
       return $anti;
    }
    public function headings():array{
        return[
            'ID',
            'Nombre del Antibiotico',
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
            'B'=>20,
            'C'=>19,
            'D'=>19,
            'E'=>20, 
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