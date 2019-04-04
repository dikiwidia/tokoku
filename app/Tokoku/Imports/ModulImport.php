<?php

namespace App\Tokoku\Imports;

use App\Tokoku\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ModulImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Modul([
            'code'          => $row[0], 
            'name'          => $row[1],
            'measure_id'    => $row[2],
            'price'         => $row[3],
            'warn_stock'    => $row[4],
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}