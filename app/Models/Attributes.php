<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = 'attributes';

    public $timestamps = false;

    protected $fillable = ['categoryId', 'name', 'type', 'content'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories', 'categoryId', 'id');
    }

}
