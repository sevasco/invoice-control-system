<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->increments('invoice_item_id', 11);
            $table->increments('item_id', 11);
            $table->string('item_code', 250);
            $table->string('item_name', 250);
            $table->decimal('invoice_item_quantity', 10, 2);
            $table->decimal('invoice_item_price',10, 2);
            $table->decimal('invoice_item_final_amount', 10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
