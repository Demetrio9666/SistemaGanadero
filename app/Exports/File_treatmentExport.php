<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\File_treatment;
use App\Models\Vitamin;
use App\Models\File_animale;
use App\Models\Antibiotic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class File_treatmentExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tra = DB::table('file_treatment')
        ->leftJoin('vitamin','file_treatment.vitamin_id','=','vitamin.id')
        ->join('file_animale','file_treatment.animalCode_id','=','file_animale.id')
        ->leftJoin('antibiotic','file_treatment.antibiotic_id','=','antibiotic.id')
        ->select('file_treatment.id',
                 'file_treatment.date',
                 'file_animale.animalCode as animal',
                 'file_treatment.disease',
                 'file_treatment.detail',
                 'antibiotic.antibiotic_d as anti',
                 'vitamin.vitamin_d as vi',
                 'file_treatment.treatment',
                 'file_treatment.recovery',
                 'file_treatment.actual_state'
                )->where('file_treatment.actual_state','=','ACTIVO')    
                
        ->get();
        return $tra;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Registro',
            'Codigo Animal',
            'Enfermedad',
            'Detalle',
            'Antibiotico',
            'Vitamina',
            'Tratamiento',
            'Recuperación',
            'Estado actual de la Información'

        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>16,
            'C'=>18,
            'D'=>20,
            'E'=>33, 
            'F'=>15, 
            'G'=>20, 
            'H'=>27, 
            'I'=>14, 
            'J'=>17, 
            'K'=>30,         
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
