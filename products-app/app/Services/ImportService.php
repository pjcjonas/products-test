<?php

namespace App\Services;

use Illuminate\Http\Request;
use Exception;

class ImportService
{

    public function processFile(Request $request, $key)
    {
        try {
            $upload = $request->file($key)->store('imports');
            return $upload;
        } catch (Exceptoin $e) {
            return $e->getMessage();
        }
    }

    public function importProducts()
    {

    }

}