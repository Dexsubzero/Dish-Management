<?php

namespace App\Exports;

use App\Models\Dish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DishesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Dish::select('id', 'name', 'description', 'price', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Price',
            'Created At',
        ];
    }
}
