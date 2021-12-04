<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    //
    protected $fillable = ['name', 'parent_id', 'slug'];
    //auto thêm các biến
    //protected $guarded = [];
    use SoftDeletes;
}
