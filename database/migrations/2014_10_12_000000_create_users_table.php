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
        $password=Hash::make('12345678');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Status')->default('Pending');
            $table->string('phone_number');
            $table->string('user_type')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('residence')->nullable();
            $table->string('next_of_kin_name')->nullable();
            $table->string('next_of_kin_email')->nullable();
            $table->string('next_of_kin_phone')->nullable();
            $table->string('next_of_kin_relationship')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert(
        array(
            'email' => 'admin@gmail.com',
            'name' => 'Administrator',
            'phone_number' => '0712345678',
            'profile_photo_path' => 'admin.jpg',
            'password' => $password,
        ));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
