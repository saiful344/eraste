<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_orders',function(Blueprint $table){
        $table->id();
        $table->string('order_code')->unique();
        $table->string("name",100);
        $table->biginteger("phone");
        $table->integer('qty');
        $table->text("address");
        $table->tinyInteger('product_id');
        $table->softDeletes('deleted_at',0);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
