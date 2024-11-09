<?php
// app/Exports/IdsExport.php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IdsExport implements FromCollection, WithHeadings
{
    protected $ids;

    public function __construct(Collection $ids)
    {
        $this->ids = $ids;
    }

    /**
     * Return a collection for Excel export
     */
    public function collection()
    {
        // Each "id" is put into its own row in the Excel sheet
        return $this->ids->map(fn($id) => [$id]);
    }

    public function headings(): array
    {
        return ['ID'];  // Heading for the ID column
    }
}

