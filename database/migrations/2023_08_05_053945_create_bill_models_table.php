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
        Schema::create('bill_models', function (Blueprint $table) {
            $table->id();
            $table->integer('cid');
            $table->integer('invoiceno');
            $table->date('date');
            $table->integer('tankgiventoday');
            $table->integer('tankreturntoday');
            $table->integer('tankremaining');
            $table->integer('tankprice');
            $table->integer('totalprice');
            $table->integer('todaystotal');
            $table->integer('previousamt');
            $table->integer('advance');
            $table->integer('completetotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_models');
    }
};
