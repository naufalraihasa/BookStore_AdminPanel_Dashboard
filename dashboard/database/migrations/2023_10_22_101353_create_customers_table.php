<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores');

        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

