<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_invoices_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->float('price');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('invoice_id');

            $table->unsignedBigInteger('supplier_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('supplier_id')->references('id')->on('suppliers');

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
        Schema::dropIfExists('make_invoices_purchases');
    }
};
