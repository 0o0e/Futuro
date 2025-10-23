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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('service');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end')->nullable();
            $table->integer('people')->default(1);
            $table->string('name');
            $table->string('email');
            $table->text('comment')->nullable();
            $table->boolean('has_table')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'service', 'date', 'time_start', 'time_end', 'people', 'name', 'email', 'comment', 'has_table'
            ]);
        });
    }
};
