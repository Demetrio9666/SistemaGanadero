<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Weigth_control;
use App\Models\File_animale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Weigth_controlExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pesoC = DB::table('weigth_control')
        ->join('file_animale','weigth_control.animalCode_id','=','file_animale.id')
        ->select('weigth_control.id'
        ,'weigth_control.date',
        'file_animale.animalCode as animal',
        'weigth_control.weigtht',
        'weigth_control.date_r',
        'weigth_control.actual_state')
        ->where('weigth_control.actual_state','=','ACTIVO')
        ->get();
        return $pesoC;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Registro',
            'Codigo Animal',
            'Peso',
            'Fecha de Proximo Control',
            'Estado actual de la Información',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>15.33,
            'C'=>18,
            'D'=>15,
            'E'=>21.89, 
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
