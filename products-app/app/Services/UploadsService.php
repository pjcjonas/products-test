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
    public function upload(Request $request, $key = '')
    {
        $this->fileName = time() . "_" .$request->file($key)->getClientOriginalName();
        // TODO ZANDO - Move this to cloud storage, it helps if your uploads are stored somewhere secure as well as a place where bandwidth is not a problem, AWS or GC.
        $request->file($key)->storeAs('imports', $this->fileName);
        $data = $this->importToDb();
        return $data;
    }

}