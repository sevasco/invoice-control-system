<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->double('total', 10, 2);
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->unsignedBigInteger('customer_id');

            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
