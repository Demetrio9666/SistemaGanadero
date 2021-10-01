<?php

namespace App\Exports\Inactivo;

use App\Models\File_reproduction_external;
use App\Models\Race;
use App\Models\File_animale;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class File_reproduction_externalInactivoExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ext =  DB::table('file_reproduction_external')
        ->join('file_animale','file_reproduction_external.animalCode_id','=','file_animale.id')
        ->join('race as R','file_animale.race_id','=','R.id')
        ->join('race','file_reproduction_external.race_id','=','race.id')
        ->select('file_reproduction_external.id',
                    'file_reproduction_external.date',
                    'file_animale.animalCode',
                    'R.race_d as raza',
                    'file_animale.age_month as edad',
                    'file_animale.sex as sexo',
                    'file_reproduction_external.animalCode_Exte',
                    'race.race_d',
                    'file_reproduction_external.age_month',
                    'file_reproduction_external.sex',
                    'file_reproduction_external.hacienda_name',
                    'file_reproduction_external.reproduction_state',
                    'file_reproduction_external.actual_state')
                    ->where('file_reproduction_external.actual_state','=','INACTIVO')
                    
        ->get();
        return $ext;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Registro',
            'Codigo Animal',
            'Raza',
            'Edad',
            'Sexo',
            'Codigo Animal Exteno',
            'Raza',
            'Edad',
            'Sexo',
            'Hacienda',
            'Estado de la Reproducción',
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
            'F'=>10.89, 
            'G'=>12, 
            'H'=>11, 
            'I'=>14, 
            'J'=>10, 
            'K'=>11.22, 
            'L'=>30, 
            'M'=>30, 
             
                     
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
       $sheet->getStyle('L1')->getFont()->setBold(true);
       $sheet->getStyle('M1')->getFont()->setBold(true);
      
    }
}
