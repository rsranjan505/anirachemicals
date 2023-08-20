<?php

namespace App\Exports;

use App\Models\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportVisits implements FromCollection, WithHeadings, WithEvents
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
        $visits = Visit::with('state','city','creator')->get();

        $row=[];
        foreach($visits as $index=>$visit){
            $row[]=[
                ++$index,
                $visit['name_of_establishment'],
                getEstablishmentType($visit['establishment_type']),
                $visit['key_person'],
                $visit['email'],
                $visit['mobile'],
                $visit['address'],
                $visit->state !=null ? $visit->state->name : '',
                $visit->city ? $visit->city->name : '',
                $visit['pincode'],
                getVisitStatus($visit['status']),
                $visit['source'],
                $visit['latitude'],
                $visit['longitude'],
                $visit['description'],
                $visit['created_at']->format('d-m-Y'),
                $visit['created_at']->format('h:i:s A'),
                $visit->creator->first_name,

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
            'Key Person',
            'Email',
            'Mobile',
            'Address',
            'State',
            'City',
            'Pincode',
            'Status',
            'Source',
            'Latitude',
            'Longitude',
            'Description',
            'Date',
            'Time',
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
