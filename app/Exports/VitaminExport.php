<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Vitamin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VitaminExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $vitamina= DB::table('vitamin')
        ->select('id','vitamin_d','date_e','date_c','supplier','actual_state')
        ->where('actual_state','=','ACTIVO')
        ->get();
        return $vitamina;
    }
    public function headings():array{
        return[
            'ID',
            'Nombre de la Vitamina',
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
            'B'=>13,
            'C'=>18,
            'D'=>15,
            'E'=>10, 
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
