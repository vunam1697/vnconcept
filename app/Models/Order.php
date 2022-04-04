<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   	protected $table = 'orders';

    protected $fillable = [
        'code', 'name', 'phone' , 'totalPrice' , 'status', 'address', 'email', 'type', 'id_city', 'id_district', 'id_ward', 'note'
    ];

    // public function OrderDetail()
    // {
    // 	return $this->hasMany('App\Models\OrderDetail', 'id_order', 'id');
    // }

    public static function totalRevenue($param = null)
    {
        $total = 0;

        $data = Order::where('status', 3)->get();

        foreach ($data as $item) {
            $total += $item->totalPrice;
        }

        return $total;
    }
}
