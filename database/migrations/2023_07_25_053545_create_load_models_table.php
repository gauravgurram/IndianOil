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
        Schema::create('load_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('loaddate');
            $table->integer('new_tanks_load');
            $table->integer('tanks_returnto_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('load_models');
    }
};
