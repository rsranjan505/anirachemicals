<?php

namespace App\Exports;

use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportVendors implements FromCollection, WithHeadings, WithEvents
{
    protected  $selects;
    protected  $row_count;
    protected  $column_count;

    public function __construct()
    {
        $this->column_count=12;//number of columns to be auto sized
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $vendors = Vendor::with('getState','getCity','creator')->get();

        $row=[];
        foreach($vendors as $index=>$vendor){
            $row[]=[
                ++$index,
                $vendor['name_of_establishment'],
                getEstablishmentType($vendor['establishment_type']),
                $vendor['pan'],
                $vendor['gst'],
                $vendor['address'],
                $vendor->getCity->name,
                $vendor->getState->name,
                $vendor['pincode'],
                $vendor['email'],
                $vendor['mobile'],
                $vendor['key_person'],
                $vendor['dob'],
                $vendor['marriage_aniversory'],
                $vendor['suggestions'],
                $vendor['is_active']==1 ? "Active":"Inactive",
                $vendor->creator->first_name,

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
            'Establishment Name',
            'Establishment Type',
            'Pan Number',
            'GSTIN',
            'Address',
            'City',
            'State',
            'Pincode',
            'Email',
            'Mobile',
            'Key Person',
            'DOB',
            'Marriage Aniversory',
            'Suggestions',
            'Status',
            'Created By',
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

                // $sheet->getStyle(1, function($row) {
                //     $row->setBackground('#CCCCCC');
                // });

                for ($i = 1; $i <= $this->column_count; $i++) {
                    $column = Coordinate::stringFromColumnIndex($i);
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
