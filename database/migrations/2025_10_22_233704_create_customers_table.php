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
            $table->id();
            $table->string('customer_type');
            $table->string('document_number');
            $table->string('name');
            $table->string('postal_code');
            $table->string('address');
            $table->integer('number');
            $table->string('district');
            $table->string('address_complement');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone_number');
            $table->string('email');
            $table->foreignId('company_id')->constrained('companies');
            $table->string('created_by');
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
