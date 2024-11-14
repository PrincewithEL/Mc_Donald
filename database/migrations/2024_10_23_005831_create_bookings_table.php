<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('doctor_id');
            $table->string('referral_doctor_id')->nullable();                        
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');            
            $table->string('details');
            $table->string('details1')->nullable();
            $table->string('details2')->nullable();
            $table->string('details3')->nullable();
            $table->string('details4')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
            $table->enum('Status', ['Active', 'Completed', 'Cancelled','Accepted','Denied'])->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
