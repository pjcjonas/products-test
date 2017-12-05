<?php

namespace App\Repositories;

use App\Product;
use Exception;

class ProductImportRepository
{

    /** @var array */
    protected $importData;

    public function __construct($importData)
    {
        $this->importData = $importData;
    }

    public function importProductData()
    {
        try {
            $product = new Product();

        } catch (Exception $e) {

        }
    }

}