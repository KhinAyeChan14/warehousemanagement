<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $fillable=[
    	'code_no','name','photo','description','subcategory_id','brand_id',
    ];

}
