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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Customer::class, 'customer_id');
            $table->foreignIdFor(App\Models\User::class, 'created_by');
            $table->boolean('delivery')->default(0);
            $table->string('status');
            $table->decimal('total_products', 9, 1);
            $table->decimal('total_price', 9, 2);
            $table->decimal('taxes', 9, 2)->default(0);
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
