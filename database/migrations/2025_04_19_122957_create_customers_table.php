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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('customer_id')->unique();
            $table->string('customer_name');
            $table->string('olt')->unique();
            $table->string('ont')->unique();
            $table->string('telp');
            $table->text('alamat');
            $table->foreignId('packet_id')->constrained('packets')->cascadeOnDelete();
            $table->integer('bandwidth');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
