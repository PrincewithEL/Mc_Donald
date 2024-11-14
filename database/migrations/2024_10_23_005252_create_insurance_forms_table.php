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
                Schema::create('insurance_forms', function (Blueprint $table) {
            $table->id();
            $table->string('practitioner_name');
            $table->string('practitioner_stamp')->nullable();
            $table->string('postal_address');
            $table->string('tel_no')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('patient_full_name');
            $table->date('patient_date_of_birth');
            $table->string('member_full_name')->nullable();
            $table->string('member_tel_no')->nullable();
            $table->string('member_no')->nullable();
            $table->string('member_employer_name')->nullable();
            $table->string('member_department_branch')->nullable();
            $table->boolean('previous_sickness')->default(false);
            $table->text('sickness_details')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment_prescribed')->nullable();
            $table->enum('medicines', ['Prescription', 'Injection', 'Dispensed', 'None'])->default('None');
            $table->enum('radiology', ['X-Ray', 'MRI/Cat Scan', 'Other'])->nullable();
            $table->enum('pathology', ['Haematology', 'Microbiology', 'Biochemistry', 'Histology'])->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('consultant_referred_to')->nullable();
            $table->string('consultant_specialty')->nullable();
            $table->text('medication_prescribed')->nullable();
            $table->string('doctor_signature')->nullable();
            $table->date('doctor_signature_date')->nullable();
            $table->string('member_signature')->nullable();
            $table->date('member_signature_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_forms');
    }
};
