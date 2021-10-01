<?php

namespace App\Exports\Inactivo;

use Illuminate\Support\Facades\DB;
use App\Models\File_animale;
use App\Models\Race;
use App\Models\Artificial_Reproduction;
use App\Models\File_reproduction_artificial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class File_reproduction_artificialInactivoExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $re_A = DB::table('file_reproduction_artificial')
                    ->join('file_animale','file_reproduction_artificial.animalCode_id_m','=','file_animale.id')
                    ->join('artificial_reproduction','file_reproduction_artificial.artificial_id','=','artificial_reproduction.id')
                    ->join('race as f','file_animale.race_id','=','f.id')
                    ->Join('race as a','artificial_reproduction.race_id','=','a.id')
                    ->select('file_reproduction_artificial.id',
                            'file_reproduction_artificial.date as fecha_A',
                            'file_animale.animalCode as animalA',
                            'f.race_d as raza_h',  
                            'artificial_reproduction.reproduccion as tipo', 
                            'a.race_d as raza_m',
                            'file_reproduction_artificial.reproduction_state',
                            'file_reproduction_artificial.actual_state'
                            )
                            ->where('file_reproduction_artificial.actual_state','=','INACTIVO')
                            
                    ->get(); 
        return $re_A;
    }
    public function headings():array{
        return[
            'ID',
            'Fecha de Registro',
            'Codigo Animal',
            'Raza',
            'Tipo de Material Genetico',
            'Raza',
            'Estado de la Reproducción',
            'Estado actual de la información',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>16,
            'C'=>18,
            'D'=>15,
            'E'=>23, 
            'F'=>25, 
            'G'=>35, 
            'H'=>35,
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
      
    }
}
