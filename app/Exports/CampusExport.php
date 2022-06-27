<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CampusExport implements FromCollection, WithEvents, WithHeadings, ShouldAutoSize
{
    public $campuses = [];

    public function __construct($campuses)
    {
        $this->campuses = $campuses;
    }

    public function collection()
    {
        return $this->campuses;
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOMBRE',
            'DEPARTAMENTO',
            'PROVINCIA',
            'DISTRITO',
            'DIRECCION',
            'F. CREACIÓN',
            'F. MODIFICACIÓN',
        ];
    }

    public function registerEvents(): array
    {

        // Fuente Negrita Tamaño 12 color blanco (cabecera)
        $font = [
            'bold' => true,
            'size' => 12,
            'color' => ['argb' => 'FFFFFF']
        ];

        // Alinear al centro
        $alignment = [
            'horizontal' => 'center'
        ];

        $border = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        //Relleno del fondos
        $fill = [
            'fillType'   => Fill::FILL_SOLID,
            'startColor' => ['argb' => '366092'],
        ];

        // Estilos de la cabecera
        $styles = ['fill' => $fill, 'alignment' => $alignment, 'font' => $font];

        return [
            AfterSheet::class => function (AfterSheet $event) use ($styles, $border) {

                // Aplicando estilos a la cabecera
                $event->sheet->getStyle('A1:H1')->ApplyFromArray($styles);

                // numero de filas para bordear
                $i = count($this->campuses) + 1;
                
                // Aplicando los bordes
                $event->sheet->getStyle('A1:H'.$i)->ApplyFromArray($border);
            }
        ];
    }
}
