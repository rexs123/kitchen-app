<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cus_id');
            $table->json('address')->default(new Expression('(JSON_ARRAY())'));
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->json('allergies')->default(new Expression('(JSON_ARRAY())'));
            $table->boolean('charge_delivery')->default(1);
            $table->string('avatar')->nullable();
            $table->date('dob')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
