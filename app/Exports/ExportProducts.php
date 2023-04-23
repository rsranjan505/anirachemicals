<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportProducts implements FromCollection, WithHeadings, WithEvents
{
    protected  $selects;
    protected  $row_count;
    protected  $column_count;

    public function __construct()
    {
        $this->column_count=17;//number of columns to be auto sized
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::with('creator')->get();
        $row=[];
        foreach($products as $index => $product){
            $row[]=[
                ++$index,
                $product['name'],
                $product['code'],
                $product['brand']?? '',
                $product['form'],
                $product['packing_type'],
                $product['packaging_size']??'',
                $product['dosage']??'',
                $product['description'],
                $product['advantages']?? '',
                $product['other_details']?? '',
                $product['manufactured_by'],
                $product['manufactured_date']?? '',
                $product['quantity'],
                $product['unit'],
                $product['mrp'],
                $product['is_active']==1 ? "Active":"Inactive",
                $product->creator->first_name,

            ];
        }

        $data =[
            $row,
        ];
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'SN',
            'Product Name',
            'Product Code',
            'Product Brand',
            'Form',
            'Product Packing Type',
            'Product Packing Size',
            'Dosage',
            'Description',
            'Advantages',
            'Other Details',
            'Manufactured By',
            'Manufactured Date',
            'Quantity',
            'Unit',
            'MRP',
            'Status',
            'Created By'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            // handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {

            $sheet = $event->sheet->getDelegate();

            $sheet->getStyle('1')->getFont()->setSize(12)
                    ->setBold(true);
            // $sheet->getStyle('1')->getFill();
            // $sheet->getStyle('A')->getBorders()->getAllBorders()
            //     ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



                for ($i = 1; $i <= $this->column_count; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
