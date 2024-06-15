<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('importancies', function (Blueprint $table) {
            $table->string('importance')->primary();
        });
        DB::table('importancies')->insert([
            ['importance' => 'low'],
            ['importance' => 'normal'],
            ['importance' => 'high']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('importancies');
    }
};
