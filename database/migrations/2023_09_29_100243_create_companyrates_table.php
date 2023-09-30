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
        Schema::create('companyRates', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('company_rates_type')->nullable();
            $table->string('company_name')->nullable();
            $table->double('company_exchange_rate',places:2)->nullable();
            $table->double('company_charges_rate',places:2)->nullable();
            $table->double('company_mark_up',places:2)->nullable();
            $table->double('company_total',places:2)->nullable();
            $table->string('company_website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companyRates');
    }
};
