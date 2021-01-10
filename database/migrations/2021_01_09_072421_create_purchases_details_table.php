<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id');
            $table->foreignId('item_id');
            $table->string('quantity');
            $table->string('price');
            $table->string('purchase_date');
            $table->string('user_id');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('purchases_details');
    }
}
