<?php

namespace App\Exports;

use App\Models\Deworming_control;
use App\Models\File_animale;
use App\Models\Dewormer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Deworming_controlExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $desC = DB::table('deworming_control')
        ->join('file_animale','deworming_control.animalCode_id','=','file_animale.id')
        ->join('dewormer','deworming_control.deworming_id','=','dewormer.id')
        ->select('deworming_control.id',
                 'deworming_control.date',
                 'file_animale.animalCode as animal',
                 'dewormer.dewormer_d as des',
                 'deworming_control.date_r',
                 'deworming_control.actual_state')
                 ->where('deworming_control.actual_state','=','ACTIVO')
        ->get();
        return $desC;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Control',
            'Codigo Animal',
            'Desparasitante',
            'Fecha de próxima dosis',
            'Estado actual de la Información',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>19,
            'C'=>25,
            'D'=>29,
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
