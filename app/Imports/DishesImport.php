<?php

namespace App\Imports;

use App\Models\Dish;
use Maatwebsite\Excel\Concerns\ToModel;

class DishesImport implements ToModel
{
    public function model(array $row)
    {
        return new Dish([
            'name'        => $row[0],
            'description' => $row[1],
            'price'       => $row[2],
        ]);
    }
}
