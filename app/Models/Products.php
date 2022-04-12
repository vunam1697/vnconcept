<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'idNhanh', 'categoryId' , 'parentId' , 'code' , 'name', 'otherName' , 'importPrice', 'oldPrice' , 'price' , 'wholesalePrice' ,
        'vat', 'image', 'images' , 'status' , 'previewLink' , 'description', 'content' , 'showHot', 'showNew' , 'showHome' , 'width',
        'height', 'warrantyAddress', 'warrantyPhone' , 'warranty' , 'warrantyContent' , 'length', 'shippingWeight' , 'createdDateTime',
        'brandId' , 'brandName' , 'typeId', 'typeName', 'avgCost' , 'countryName' , 'unit' , 'importType', 'importTypeLabel' , 'thumbnail',
        'advantages', 'merchantCategoryId', 'merchantProductId' , 'highlights', 'order', 'detailProduct', 'sale_price', 'sale',
        'regular_price', 'color', 'collection', 'designer', 'fabric_material', 'slug', 'specification'
	];

    public function category()
    {
    	return $this->belongsTo('App\Models\Categories', 'categoryId', 'categoryId');
    }
}
