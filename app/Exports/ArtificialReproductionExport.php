<?php

namespace App\Exports;

use App\Models\Artificial_Reproduction;
use App\Models\Race;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArtificialReproductionExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $arti= DB::table('artificial_reproduction')
        ->join('race','race.id','=','artificial_reproduction.race_id')
        ->select('artificial_reproduction.id',
                    'artificial_reproduction.date',
                    'race.race_d  as raza',
                    'artificial_reproduction.reproduccion',
                    'artificial_reproduction.supplier',
                    'artificial_reproduction.actual_state'
        )->where('artificial_reproduction.actual_state','=','ACTIVO')
    ->get();
    return $arti;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Registro',
            'Raza',
            'Material Genetico',
            'Proveedor',
            'Estado actual de la Información',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>13,
            'C'=>20,
            'D'=>20,
            'E'=>20, 
            'F'=>30, 
            'G'=>30, 
                     
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
       $sheet->getStyle('G1')->getFont()->setBold(true);

    }



}
