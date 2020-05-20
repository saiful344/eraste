<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class M_Product extends Model
{
    use SoftDeletes;

    protected $table = "tb_product";
    protected $dates = ["deleted_at"];
    
    protected $fillable = ["code","name","price","qty"];

    public function orders()
	{
		return $this->hasMany(M_Orders::class,"product_id");
	}
}
