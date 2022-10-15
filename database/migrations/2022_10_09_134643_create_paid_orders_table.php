<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaidOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->unsigned();;
            $table->string('date')->nullable()->default('');
            $table->double('amount')->nullable()->default(0);
            $table->string('image');
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
        Schema::dropIfExists('paid_orders');
    }
}

