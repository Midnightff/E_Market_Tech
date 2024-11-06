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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id('idShipment');
            $table->foreignId('idOrder')->constrained('orders', 'idOrder');
            $table->dateTime('shipment_date');
            $table->date('estimated_delivery_date');
            $table->foreignId('idStatus')->constrained('statuses', 'idStatus');
            $table->text('delivery_address');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
