<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class M_Orders extends Model
{
    use SoftDeletes;

    protected $table = "tb_orders";
    protected $dates = ["deleted_at"];
    
    protected $fillable = ["order_code","product_id","name","phone","address","qty"];

    public function Product()
	{
		return $this->belongsTo(M_Product::class);
	}

}
