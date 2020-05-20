<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tb_product',function (Blueprint $table){
        $table->id();
        $table->char('code',3);
        $table->string('name',100);
        $table->biginteger('price');
        $table->integer('qty')->default(0);
        $table->string('image',0)->default(0);
        $table->softDeletes("deleted_at",0);
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
