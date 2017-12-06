<?php

namespace App\Services;

use App\Product;
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

    /**
     * Process and import data into DB
     *
     * @return bool
     */
    public function importToDb()
    {
        $filePath = storage_path('app/imports/') . $this->fileName;
        $this->handle = fopen($filePath, 'rw');

        $data = $this->getCsvData();

        $importRepository = new ProductImportRepository();
        $import = $importRepository->importData($data);

        return $import;
    }

    /**
     * Extract the CSV data for importing
     * TODO - This needs to be added to a que or worker. This is not sustainable if you are importing CSV files with millions of records.
     *
     * @return array
     */
    private function getCsvData()
    {
        $skipFirst = true;
        $dataStack = [];
        $headers =[];

        while (($row = fgetcsv($this->handle, 0, ",", "'")) !== FALSE) {
            if (!$skipFirst) {
                $column = [];
                foreach ($headers as $index => $col) {
                    $value = $row[$index];
                    if ($value && !empty($value) && strtolower($value) != 'null') {
                        $column[$col] = $value;
                    } else {
                        $column[$col] = null;
                    }
                }
                $dataStack []= $column;
            } else {
                $headers = $row;
                $skipFirst = false;
            }
        }
        fclose($this->handle);
        return ['headers' => $headers, 'data' => $dataStack];
    }

}