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
        //
        Schema::create('stocks', function (Blueprint $table) {
            
            $table->id();
            $table->string('stock_symbol')->unique();
            $table->string('company_name');
            $table->integer('quantity')->unsigned();
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('current_price', 8, 2)->nullable();
            $table->date('purchase_date');
            $table->string('market')->nullable();
            $table->string('sector')->nullable();
            $table->string('industry')->nullable();
            $table->decimal('dividend_yield', 5, 2)->nullable();
            $table->decimal('earnings_per_share', 8, 2)->nullable();
            $table->decimal('price_earnings_ratio', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('stocks');
    }
};
