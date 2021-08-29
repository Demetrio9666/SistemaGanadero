<?php

namespace App\Exports\Inactivo;

use App\Models\Dewormer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DewormerInactivoExport implements FromCollection ,WithHeadings,WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $desp = DB::table('dewormer')
            ->select('dewormer.id',
                    'dewormer.dewormer_d',
                    'dewormer.date_e',
                    'dewormer.date_c',
                    'dewormer.supplier',
                    'dewormer.actual_state')
                    ->where('dewormer.actual_state','=','INACTIVO')
            ->get();  
        return $desp; 
    }
    public function headings():array{
        return[
            'ID',
            'Nombre del Desparacitante',
            'Fecha de Elaboracion',
            'Fecha de Caducidad',
            'Proveedor',
            'Estado Actual',
          

        ];
    }
    public function columnWidths(): array
    {
        return [
            'A'=>5,
            'B'=>25,
            'C'=>19,
            'D'=>19,
            'E'=>20, 
            'F'=>15, 
            
                     
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
