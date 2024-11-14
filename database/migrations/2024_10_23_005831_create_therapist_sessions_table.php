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
        Schema::create('therapist__sessions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('doctor_id');
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');                        
            $table->string('details');
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
        Schema::dropIfExists('therapist__sessions');
    }
};
