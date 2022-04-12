<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'name', 'slug' , 'image', 'description', 'content', 'price', 'sale_price' , 'list_product', 'status', 'categoryId'
	];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories', 'categoryId', 'id');
    }
}
