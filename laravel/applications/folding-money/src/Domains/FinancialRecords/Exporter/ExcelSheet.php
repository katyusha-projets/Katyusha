<?php

namespace FoldingMoney\Domains\FinancialRecords\Exporter;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class ExcelSheet extends DefaultValueBinder implements FromCollection, WithStyles, WithTitle, WithHeadings, ShouldAutoSize, WithEvents, WithCustomValueBinder {
    protected int $maxRows = 500;
    protected array $rows  = [];
    protected string $title;

    public function __construct(protected string $sheetKey, protected array $data) {
        $this->title = $this->parseCamelTitle($sheetKey);

        foreach ($data as $item) {
            $this->rows[] = $item;

            if (count($this->rows) > $this->maxRows) {
                break;
            }
        }
    }

    public function bindValue(Cell $cell, $value) {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    protected function parseCamelTitle(string $title): string {
        return ucwords(implode(' ', preg_split('/(?=[A-Z])/', $title)));
    }

    public function styles(Worksheet $sheet) {
        return [
            1    => ['font' => ['bold' => true], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]
        ];
    }

    protected function isValuePossibleMonetary(mixed $value): bool {
        return (int) $value > 1000000;
    }

    public function registerEvents(): array {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $sheet       = $event->sheet;
                $highestCol  = $sheet->getCellCollection()->getHighestColumn();

                $cellRange   = 'A:'.$highestCol;

                $event->sheet->getDelegate()->freezePane('A2');

                foreach ($sheet->getColumnIterator() as $column) {
                    $columnKey   = $column->getColumnIndex();
                    $headingCell = $sheet->getCell($columnKey.'1');
                    $valueCell   = $sheet->getCell($columnKey.'2');
                    $value       = $valueCell->getValue();

                    if (!$value) {
                        foreach ($sheet->getRowIterator() as $row) {
                            $rowIndex = $row->getRowIndex();
                            $value    = $sheet->getCell($columnKey.$rowIndex)->getValue();

                            if ($this->isValuePossibleMonetary($value)) {
                                $sheet->formatColumn($columnKey, NumberFormat::FORMAT_CURRENCY_USD);
                            }
                        }
                    }

                    if ($this->isValuePossibleMonetary($value)) {
                        $sheet->formatColumn($columnKey, NumberFormat::FORMAT_CURRENCY_USD);
                    }
                }

                $sheet->getDelegate()->getStyle($cellRange)->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT]]);
                $sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
            },
        ];
    }

    public function headings(): array {
        $res = [];

        foreach ($this->data[0] as $k => $v) {
            $res[] = $this->parseCamelTitle($k);
        }

        return $res;
    }

    public function title(): string {
        return $this->title;
    }

    public function collection() {
        return collect($this->rows);
    }
}
