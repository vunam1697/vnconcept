<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = ['categoryId', 'parentId','code','name','order', 'showHome', 'showHomeOrder', 'privateId','image', 'content'];


    public function get_child_cate()
    {
        return $this->where('parentId', $this->categoryId)->get();
    }

    public function getParent()
    {
        return $this->where('categoryId', $this->parentId)->first();
    }

}
