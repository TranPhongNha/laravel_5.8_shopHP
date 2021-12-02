<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //thêm softdeletes dùng set delete_at(time) trên data base
    use SoftDeletes;

    protected  $fillable = ['name','parent_id','slug'];
}
