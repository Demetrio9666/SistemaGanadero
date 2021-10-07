<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Race;
use App\Models\Vaccine;
use App\Models\Vaccine_control;
use App\Models\File_animale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Vaccine_controlExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $vacunaC= DB::table('vaccine_control')
                    ->join('file_animale','vaccine_control.animalCode_id','=','file_animale.id')
                    ->join('vaccine','vaccine_control.vaccine_id','=','vaccine.id')
                    ->select('vaccine_control.id',
                            'vaccine_control.date',
                            'file_animale.animalCode as animal',
                             'vaccine.vaccine_d as vacuna',
                            'vaccine_control.date_r',
                            'vaccine_control.actual_state'
                            )->where('vaccine_control.actual_state','=','ACTIVO')
                    ->get();
        return $vacunaC;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Control',
            'Codigo Animal',
            'Vacuna',
            'Fecha proxima Dosis',
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
