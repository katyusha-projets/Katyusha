<?php

namespace FoldingMoney\Domains\FinancialRecords\Exporter;

use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use FoldingMoney\Domains\FinancialRecords\ParsedFinancialRecords;

class ExcelExporter implements Responsable, WithMultipleSheets {
    use Exportable;

    public function __construct(protected ParsedFinancialRecords $records) {
    }


    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'invoices.xlsx';

    /**
     * Optional Writer Type.
     */
    private $writerType = Excel::XLSX;

    public function sheets(): array {
        $sheets = [];

        foreach ($this->records as $key => $item) {
            $sheets[] = new ExcelSheet($key, $item->toArray());
        }

        return $sheets;
    }
}
