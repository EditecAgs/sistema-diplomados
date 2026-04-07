<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Inscription;


class AceptadosExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $inscriptions;

    public function __construct($inscriptions)
    {
        $this->inscriptions = $inscriptions;
    }

    public function collection()
    {
        return $this->inscriptions;
    }

    public function headings(): array
    {
        return [
            'RFC',
            'CURP',
            'Nombre(s)',
            'Apellidos',
            'Género',
            'Correo electrónico',
            'Shortname Moodle',
            'Fecha de aceptación',
            'Evaluado por'
        ];
    }

    public function map($inscription): array
    {
        // Mapeo de género
        $generos = [
            'M' => 'Masculino',
            'F' => 'Femenino',
            'ND' => 'Prefiero no decir'
        ];

        return [
            $inscription->rfc ?? 'N/A',
            $inscription->curp ?? 'N/A',
            $inscription->first_name ?? 'N/A',
            $inscription->last_name ?? 'N/A',
            $generos[$inscription->gender] ?? 'N/A',
            $inscription->email ?? 'N/A',
            $inscription->status->graduate->shortname_moodle ?? 'Pendiente',
            $inscription->status->created_at ? $inscription->status->created_at->format('d/m/Y H:i') : 'N/A',
            $inscription->status->user->name ?? 'N/A'
        ];
    }

     public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 11],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'E5E7EB']
                ]
            ]
        ];
    }


}
