<?php

namespace App\Jobs;

use App\Mail\AdminSuccessOrderMail;
use App\Mail\CustomerSuccessOrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CustomerSuccessOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Order $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order_items = OrderItem::where('order_id',$this->order->id)->with('product','customer','packing_size','packing_size.unit')->get();
        $this->order->order_items = $order_items;

        Mail::to($this->order->email)->send(new  CustomerSuccessOrderMail($this->order));

    }
}