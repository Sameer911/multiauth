<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateCashInHandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_in_hand', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable()->default(0);
            $table->double('debit')->nullable()->default(0);
            $table->double('credit')->nullable()->default(0);
            $table->string('description')->nullable()->default('');
            $table->integer('order_id')->nullable()->default(0);    
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_in_hand');
    }
}
