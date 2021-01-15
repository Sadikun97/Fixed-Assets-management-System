<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignID('item_id')->nullable();
            $table->foreignID('employee_id')->nullable();
            $table->string('location')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('remark');
            $table->string('status')->default('unuesed');
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
        Schema::dropIfExists('item_distributions');
    }
}
