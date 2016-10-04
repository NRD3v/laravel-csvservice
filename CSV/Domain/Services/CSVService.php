<?php

namespace YOURFOLDER\CSV\Domain\Services;

use Excel;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Classes\LaravelExcelWorksheet;
use Maatwebsite\Excel\Readers\LaravelExcelReader;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;

class CSVService
{
    /**
     * Export result of SQL request into CSV
     * @param $fileName
     * @param $docTitle
     * @param $query
     */
    public function exportCSV($fileName, $docTitle, $query)
    {
        /** @var LaravelExcelWriter $excel */
        $excel = Excel::create($fileName, function (LaravelExcelWriter $excel) use ($docTitle, $query) {
            $excel->sheet($docTitle, function (LaravelExcelWorksheet $sheet) use ($query) {
                $sheet->fromArray($query);
            });
        });
        $excel->export('csv');
    }

    /**
     * File conversion from CSV to Array
     * @param string $filename
     * @param string $delimiter
     * @return array|bool
     */
    public function csvToArray($filename = '', $delimiter = ',')
    {
        /** @var LaravelExcelReader $reader */
        $reader = Excel::load($filename, null, null, false, function (LaravelExcelReader $reader) use ($delimiter) {
            $reader->setDelimiter($delimiter);
        });
        return $reader->all()->toArray();
    }
}
