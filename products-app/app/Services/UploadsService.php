<?php

namespace App\Services;

use Illuminate\Http\Request;
use Exception;

class UploadsService extends DbImportService
{
    /**
     * Upload the file sent from the request     *
     * @param Request $request
     * @param $key
     * @return false|string cxdswaq 1`qgft vf 7h6
     */
    public function upload(Request $request, $key = '', $import = false, $skipFirst = false)
    {
        try {
            $this->fileName = time() . "_" .$request->file($key)->getClientOriginalName();
            $file = $request
                ->file($key)
                ->storeAs('imports', $this->fileName);

            $this->importToDb($skipFirst);
            return $file;
        } catch (Exception $e) {
            dd("upload", $e->getMessage());
        }
    }

}