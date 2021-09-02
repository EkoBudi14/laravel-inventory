<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_order', function (Blueprint $table) {
            $table->id();
            $table->string('code',5)->nullable();
            $table->string('name',15)->nullable();
            $table->string('exhaust_section',10)->nullable();
            $table->string('years',5)->nullable();
            $table->integer('qty')->nullable();
            $table->string('price',10)->nullable();
            $table->integer('invoice_number')->nullable();
            $table->string('customers_id',2)->nullable();
            $table->timestamp('date')->nullable();
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
        Schema::dropIfExists('invoice_order');
    }
}
