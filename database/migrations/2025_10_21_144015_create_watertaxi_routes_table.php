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
        Schema::create('watertaxi_routes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('destination');
            $table->integer('duration');
            $table->decimal('price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watertaxi_routes');
    }
};
