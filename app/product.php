<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
	use SoftDeletes;

    protected $table = "tb_product";
    protected $dates = ["deleted_at"];
    
    protected $fillable = ["code","name","price","qty"];
    
}
