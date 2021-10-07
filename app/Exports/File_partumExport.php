<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\File_partum;
use App\Models\Vitamin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class File_partumExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $par = DB::table('file_partum')
        ->join('file_animale','file_partum.animalCode_id','=','file_animale.id')
        ->select('file_partum.id',
                'file_partum.date',
                'file_animale.animalCode as animal',
                'file_partum.male',
                'file_partum.female',
                'file_partum.dead',
                'file_partum.mother_status',
                'file_partum.partum_type',
                'file_partum.actual_state'
                )->where('file_partum.actual_state','=','Disponible')
                
        ->get();
        return $par;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha',
            'Codigo Animal',
            'Macho',
            'Hembra',
            'Muerto',
            'Estado de la Madre ',
            'Tipo de Parto',
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
            'E'=>15, 
            'F'=>15, 
            'G'=>21, 
            'H'=>22, 
            'I'=>30,        
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
