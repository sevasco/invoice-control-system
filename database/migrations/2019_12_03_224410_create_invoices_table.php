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
            $table->bigIncrements('invoice_id');
            $table->bigIncrements('customer_id');
            $table->timestamps('invoice_date');
            $table->string('customer_name', 250);
            $table->text('customer_address');
            $table->decimal('invoice_total_before_tax', 10, 2);
            $table->decimal('invoice_total_tax', 10, 2);
            $table->string('invoice_tax');
            $table->double('invoice_total_after_tax', 10, 2);
            $table->decimal('invoice_amount_paid', 10, 2);
            $table->decimal('invoice_total_amount_due', 10, 2);
            $table->text('note');
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
