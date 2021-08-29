<?php

namespace App\Exports\Inactivo;

use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Pregnancy_control;
use App\Models\Vitamin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Pregnancy_controlInactivoExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pre = DB::table('pregnancy_control')
             ->join('vitamin','pregnancy_control.vitamin_id','=','vitamin.id')
             ->join('file_animale','pregnancy_control.animalCode_id','=','file_animale.id')
             ->select('pregnancy_control.id',
                      'pregnancy_control.date',
                       'file_animale.animalCode as animal',
                        'vitamin.vitamin_d as vitamina',
                        'pregnancy_control.alternative1 as alt1',
                        'pregnancy_control.alternative2  as alt2',
                         'pregnancy_control.observation',
                        'pregnancy_control.date_r',
                        'pregnancy_control.actual_state')
                        ->where('pregnancy_control.actual_state','=','INACTIVO')
             ->get();   
             return $pre;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Control',
            'Codigo Animal',
            'Vitamina',
            'Alternativa 1 de Vitamina',
            'Alternativa 2 de Vitamina',
            'Observacion',
            'Fecha Proximo Control',
            'Estado Actual',
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
            'F'=>10.89, 
            'G'=>12, 
            'H'=>11, 
            'I'=>15, 
                     
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
       $sheet->getStyle('H1')->getFont()->setBold(true);
       $sheet->getStyle('I1')->getFont()->setBold(true);
    }
}
