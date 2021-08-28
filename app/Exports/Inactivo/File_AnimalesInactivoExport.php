<?php

namespace App\Exports\Inactivo;

use Illuminate\Support\Facades\DB;
use App\Models\File_Animale;
use App\Models\Location;
use App\Models\Race;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class File_AnimalesInactivoExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $animal = DB::table('file_animale')
                    ->join('race','file_animale.race_id','=','race.id')
                    ->join('location','file_animale.location_id','=','location.id')
                    ->select('file_animale.id as ID','file_animale.animalCode as Codigo Animal','file_animale.date as Fecha de Nacimiento','race.race_d as Raza',
                            'file_animale.sex as Sexo','file_animale.stage as Etapa','file_animale.source as Origen','file_animale.age_month as Edad-Meses',
                            'file_animale.health_condition as Estado de Salud','file_animale.gestation_state as Embarazo','file_animale.actual_state as Estado Actual','location.location_d as Localizacion'
                            ,'file_animale.conceived as Concevido')
                            ->where('file_animale.actual_state','=','INACTIVO')
                    ->get();
        return $animal;
    }
    public function headings():array{
        return[
            'ID',
            'Codigo Animal',
            'Fecha de Nacimiento',
            'Raza',
            'Sexo',
            'Etapa',
            'Origen',
            'Edad-Meses',
            'Estado de Salud',
            'Embarazo',
            'Estado Actual',
            'Localizacion',
            'Concevido',

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
            'L'=>10.67, 
            'M'=>22.12,   
                     
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
