<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

//    tạo liên hệ
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id')->withTimestamps();
    }
    //lay danh mục cho  trang index sp
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
