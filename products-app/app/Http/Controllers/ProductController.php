<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCsvImportRequest;
use App\Services\UploadsService;
use Exception;

class ProductController extends Controller
{
    /** @var UploadsService */
    protected $uploadsService;

    /**
     * ProductsController constructor.
     */
    public function __construct(UploadsService $uploadsService)
    {
        $this->uploadsService = $uploadsService;
    }

    public function importProductsView()
    {
        return view('welcome');
    }

    public function importProducts(ProductCsvImportRequest $request)
    {
        try {
            $file = $this->uploadsService->upload($request, 'import_products', true, false);
        } catch (Exception $e) {
            dd("importProducts ", $e->getMessage());
        }
    }
}
