<?php

namespace App\Repositories;

use App\Product;
use Exception;

class ProductImportRepository
{

    /**
     * ProductImportRepository constructor.
     */
    public function __construct()
    {
    }

    /**
     * Insert the imported data
     * @return bool
     */
    public function importData($importData)
    {
        $importStatus = Product::insert($importData['data']);
        return $importStatus;
    }

}