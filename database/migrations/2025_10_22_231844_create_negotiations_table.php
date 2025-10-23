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
        Schema::create('negotiations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('stage_id')->constrained('stages');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('closing_reason')->constrained('closing_reasons');
            $table->string('value');
            $table->string('status');
            $table->text('observation');
            $table->integer('order_number');
            $table->date('estimated_closing_date');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negotiations');
    }
};
