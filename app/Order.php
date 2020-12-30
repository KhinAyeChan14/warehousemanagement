<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    Protected $fillable=[
    	'user_id','customer_id','order_date','voucher_no','total','status',
    ];

}
