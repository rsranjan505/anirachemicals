<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportOrders implements FromCollection, WithHeadings, WithEvents
{
    protected  $selects;
    protected  $row_count;
    protected  $column_count;

    public function __construct()
    {
        $this->column_count=5;//number of columns to be auto sized
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::with('state','city','creator')->get();
        $row=[];
        foreach($orders as $key => $order){
            $row[]=[
                ++$key,
                $order['customer_name'],
                $order['email']??'',
                $order['mobile']??'',
                $order['address']??'',
                $order->state->name,
                $order->city->name,
                $order['pincode'],
                $order['bill_amount'],
                $order['is_delivered'] == 1 ? 'Yes' :'No',
                $order['delivered_date']??'',
                $order->creator->first_name,

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
            'Customer Name',
            'Email',
            'Mobile',
            'Address',
            'City',
            'State',
            'Pincode',
            'Bill Amount',
            'Is Delivered',
            'Delivered Date',
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

            $sheet->getStyle('0')->getFont()->setSize(12)
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
