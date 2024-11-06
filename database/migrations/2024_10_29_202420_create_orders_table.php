<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('idOrder');
            $table->string('order_code')->unique();
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('total', 10, 2);
            $table->foreignId('idUser')->constrained('users', 'id');
            $table->foreignId('idStatus')->constrained('statuses', 'idStatus');
            $table->foreignId('idPaymentMethod')->constrained('payment_methods', 'idPaymentMethod');
            $table->dateTime('payment_date');
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
