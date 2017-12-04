<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCsvImportRequest;
use App\Services\ImportService;
use Exception;

class ProductController extends Controller
{
    /** @var ImportService */
    protected $importService;

    /**
     * ProductsController constructor.
     */
    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public function importProductsView()
    {
        return view('welcome');
    }

    public function importProducts(ProductCsvImportRequest $request)
    {
        try {
            $file = $this->importService->processFile($request, 'import_products');
        } catch (Exception $e) {

        }
    }
}
