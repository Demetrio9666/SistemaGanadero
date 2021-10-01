<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\File_reproduction_internal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class File_reproduction_internalExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $re_MI = DB::table('file_reproduction_internal')
              ->join('file_animale as M','file_reproduction_internal.animalCode_id_m','=','M.id')
              ->join('file_animale as P','file_reproduction_internal.animalCode_id_p','=','P.id')

              ->join('race as RM','M.race_id','=','RM.id')
              ->join('race as RP','P.race_id','=','RP.id')


              ->select('file_reproduction_internal.id',
                       'file_reproduction_internal.date as fecha_MI',

                       'M.animalCode as animal_h_MI',
                       'RM.race_d as raza_h_MI',
                       'M.sex as sexo_h',
                       'M.age_month as edad_h',

                       'P.animalCode as animal_m_MI',
                       'RP.race_d as raza_m_MI',
                       'P.sex as sexo_m',
                       'P.age_month as edad_m',
                       'file_reproduction_internal.reproduction_state',
                       'file_reproduction_internal.actual_state'
                      )->where('file_reproduction_internal.actual_state','=','ACTIVO')
                      
              ->get();
              return $re_MI;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Registro',
            'Codigo Animal',
            'Raza',
            'Edad',
            'Sexo',
            'Codigo Animal',
            'Raza',
            'Edad',
            'Sexo',
            'Estado de la Reproducción',
            'Estado actual de la información',
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
            'I'=>14, 
            'J'=>10, 
            'K'=>15, 
            'L'=>35,
            'M'=>35,
               
                     
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
       $sheet->getStyle('J1')->getFont()->setBold(true);
       $sheet->getStyle('K1')->getFont()->setBold(true);
    }

}
