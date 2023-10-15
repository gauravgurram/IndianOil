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

        // protected $fillable=['owntanks','customer_having_tanks','empty_tanks','filled_tanks','lost_tanks','total_tanks','new_tanks_load','tanks_returnto_company'];

        Schema::create('agency_models', function (Blueprint $table) {
            $table->id();
            $table->integer('owntanks');
            $table->integer('customer_having_tanks');
            $table->integer('empty_tanks');
            $table->integer('filled_tanks');
            $table->integer('lost_tanks');
            $table->integer('total_tanks');
            $table->date('todate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_models');
    }
};
