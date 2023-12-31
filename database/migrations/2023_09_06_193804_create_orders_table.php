<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            //PURCHASE INFOS
            $table->decimal('total_price', 20, 2);
            $table->longText('cars');

            //SHIPPING INFOS
            //$table->string('first_name');
            //$table->string('last_name');
            //$table->string('phone')->nullable();
            $table->string('address1', 255);
            //$table->string('address2', 255)->nullable();
            //$table->string('city', 255);
            $table->string('state', 45); //->nullable();
            $table->string('zipcode', 45);

            //STATUS PAYMENT
            $table->string('status_payment')->default('PENDING');

            //PAYMENT ID (ON STRIPE)
            //$table->longText('stripe_payment_id')->nullable();

            //OWNER ORDER
            $table->foreignIdFor(\App\Models\User::class, 'created_by');

            //OWNER EMAIL
            $table->string('email'); //->nullable();

            //STATUS SHIPPING
            $table->string('status_shipping')->nullable(); //->enum('status_shipping', , ['PENDING', 'ON_SHIPPING'])

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
