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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('document_number');
            $table->string('postal_code');
            $table->string('address');
            $table->integer('number');
            $table->string('district');
            $table->string('address_complement');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone_number');
            $table->string('company_email');
            $table->string('logo_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
