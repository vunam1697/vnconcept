<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collection';

    protected $fillable = [
        'name', 'slug' , 'image', 'description', 'content', 'price' , 'list_product', 'status', 'categoryId'
	];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories', 'categoryId', 'id');
    }
}
