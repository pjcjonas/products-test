<?php

namespace App\Services;

use App\Repositories\ProductImportRepository;
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

    public function importToDb()
    {
        try {
            $filePath = storage_path('app/imports/') . $this->fileName;
            $this->handle = fopen($filePath, 'rw');
            $data = $this->getCsvData();

            $importRepository = new ProductImportRepository($data);

            return $data;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Extract the CSV data for importing
     *
     * @return array
     */
    private function getCsvData()
    {
        $skipFirst = true;
        $dataStack = [];
        $headers =[];
        while (($data = fgetcsv($this->handle, 0, ",")) !== FALSE) {
            if (!$skipFirst) {
                $dataStack []= $data;
            } else {
                $headers []= $data;
            }

            $skipFirst = false;
        }
        fclose($this->handle);

        return ['headers' => $headers, 'data' => $dataStack];
    }

}