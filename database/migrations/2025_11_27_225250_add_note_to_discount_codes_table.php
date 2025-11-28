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
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->string('notes')->nullable()->after('purchaser_email');
            $table->string('for_who_name')->nullable()->after('notes');
            $table->string('for_who_email')->nullable()->after('for_who_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->dropColumn('notes');
            $table->dropColumn('for_who_name');
            $table->dropColumn('for_who_email');
        });
    }
};
