<?php

namespace App\Exports;

use App\Models\SensorData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SensorExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = SensorData::query();

        if ($this->startDate && $this->endDate) {

            $query->whereBetween('created_at', [
                $this->startDate . ' 00:00:00',
                $this->endDate . ' 23:59:59'
            ]);

        }

        return $query->select(
            'pm25',
            'co',
            'ozone',
            'temperature',
            'battery',
            'created_at'
        )->latest()->get();
    }

    public function headings(): array
    {
        return [
            'PM2.5',
            'CO',
            'Ozon',
            'Suhu',
            'Baterai',
            'Waktu'
        ];
    }
}