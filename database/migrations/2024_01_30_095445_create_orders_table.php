<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->float('shipping')->default(0.2);
            $table->decimal('total', 8, 2);
            $table->decimal('total_with_shipping', 8, 2);
            // email and phone number
            $table->string('email');
            $table->string('phone_number');

            //order state
            $table->enum('status', ['pending', 'processing', 'completed'])->default('pending');

            // user details
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('city');
            $table->string('country')->default('poland');
            $table->string('post_code');

            //payment
            $table->enum('payment_method', ['cash', 'credit_card'])->default('credit_card');
            $table->bigInteger('card_number');
            $table->string('expire_date');
            $table->string('security_code');

            $table->foreignId('shawermakrakows_id')->default(1)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
