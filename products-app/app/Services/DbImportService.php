<?php

namespace App\Services;

use Exception;
use DB;
use Illuminate\Support\Facades\Storage;

class DbImportService
{
    /** @var string*/
    protected $file;
    /** @var string*/
    protected $fileName;
    /** @var boolean|resource */
    protected $handle;

    public function importToDb($skipFirst = true)
    {
        try {
            $filePath = Storage::disk('local');
            $this->handle = fopen($filePath, 'rw');
            dd($this->handle);
            $data = $this->getCsvData($filePath, $skipFirst);
            return $data;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function getCsvData($filePath, $skipFirst)
    {
        $data = fgetcsv($filePath, ',');
        if ($skipFirst) {
            $data = array_shift($data);
        }
        return $data;
    }

}