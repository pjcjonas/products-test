<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCsvImportRequest;
use App\Product;
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

    /**
     * Render the welcome view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function importProductsView()
    {
        $products = Product::validProducts()->get();
        return view('welcome', [
            'products' => $products
        ]);
    }

    /**
     * @param ProductCsvImportRequest $request
     */
    public function importProducts(ProductCsvImportRequest $request)
    {
        try {
            $status = $this->uploadsService->upload($request, 'import_products');
            return redirect('/')->with('status', $status);
        } catch (Exception $e) {
            return redirect('/')->with('status', false)->with('error', $e->getMessage());
        }
    }
}
