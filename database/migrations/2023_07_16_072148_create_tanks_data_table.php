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
        // protected $fillable=['customer_name','tanks_given_today','tanks_return_today','tanks_remaining','tanks_price_per','todays_total','previous_total','total'];

        Schema::create('tanks_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("cid");
            $table->integer("tanks_given_today");
            $table->integer("tanks_return_today");
            $table->integer("tanks_remaining");
            $table->integer("previous_remaining_tanks");
            $table->integer("tanks_price_per");
            $table->integer("todays_total");
            $table->integer("today_given_amt");
            $table->integer("previous_total");
            $table->integer("payment_method");
            $table->integer("total");
            $table->integer("billinvoice");
            $table->date("givendate");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanks_data');
    }
};
