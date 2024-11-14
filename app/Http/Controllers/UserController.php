<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\Insurance_Form;

class UserController extends Controller
{

public function insertBooking(Request $request)
{

    // Step 2: Create New Booking Instance
    $booking = new Bookings;
$userId = auth()->id();
    // Step 3: Assign Validated Data to Booking Model
    $booking->user_id = $userId;
    $booking->doctor_id = $request->input('doctor_id');
    $booking->date = $request->input('date');
    $booking->end_time = $request->input('end_time');
    $booking->start_time = $request->input('start_time');
    $booking->details = $request->input('details');
    $booking->Status = 'Active';

    // Step 4: Save New Booking to Database
    $booking->save();

    // Step 5: Return Response or Redirect
    // return response()->json(['message' => 'Booking created successfully', 'booking' => $booking], 201);
       return redirect()->back();
}

public function insertBooking1(Request $request)
{

    // Step 2: Create New Booking Instance
    $booking = new Bookings;
$userId = auth()->id();
    // Step 3: Assign Validated Data to Booking Model
    $booking->doctor_id = $userId;
    $booking->user_id = $request->input('doctor_id');
    $booking->date = $request->input('date');
    $booking->end_time = $request->input('end_time');
    $booking->start_time = $request->input('start_time');
    $booking->details = $request->input('details');
    $booking->Status = 'Active';

    // Step 4: Save New Booking to Database
    $booking->save();

    // Step 5: Return Response or Redirect
    // return response()->json(['message' => 'Booking created successfully', 'booking' => $booking], 201);
       return redirect()->back();
}

    public function deleteBooking($id)
    {
        // Step 1: Find and Delete the Model
        $booking = Bookings::findOrFail($id);
        $booking->delete();

        // Step 2: Return Response
        // return response()->json(['message' => 'Booking deleted successfully']);
           return redirect()->back();
    }

public function createInsurance(Request $request)
{
    // Create a new Insurance_Form instance
    $insuranceForm = new Insurance_Form;

    // Step 1: Handle Practitioner Stamp Upload
    $stampFile = $request->file('practitioner_stamp');
    if ($stampFile) {
        $destination = 'stamps';
        $stampFilename = uniqid() . '_' . $stampFile->getClientOriginalName();
        $stampFile->move($destination, $stampFilename);
        $insuranceForm->practitioner_stamp = $stampFilename;
    }

    // Step 2: Handle Doctor Signature Upload
    $doctorSignatureFile = $request->file('doctor_signature');
    if ($doctorSignatureFile) {
        $destination = 'signatures/doctor';
        $doctorSignatureFilename = uniqid() . '_' . $doctorSignatureFile->getClientOriginalName();
        $doctorSignatureFile->move($destination, $doctorSignatureFilename);
        $insuranceForm->doctor_signature = $doctorSignatureFilename;
    }

    // Step 3: Handle Member Signature Upload
    $memberSignatureFile = $request->file('member_signature');
    if ($memberSignatureFile) {
        $destination = 'signatures/member';
        $memberSignatureFilename = uniqid() . '_' . $memberSignatureFile->getClientOriginalName();
        $memberSignatureFile->move($destination, $memberSignatureFilename);
        $insuranceForm->member_signature = $memberSignatureFilename;
    }

    // Step 4: Assign Other Form Data
    $insuranceForm->practitioner_name = $request->input('practitioner_name');
    $insuranceForm->postal_address = $request->input('postal_address');
    $insuranceForm->tel_no = $request->input('tel_no');
    $insuranceForm->mobile = $request->input('mobile');
    $insuranceForm->email = $request->input('email');
    $insuranceForm->patient_full_name = $request->input('patient_full_name');
    $insuranceForm->patient_date_of_birth = $request->input('patient_date_of_birth');
    $insuranceForm->member_full_name = $request->input('member_full_name');
    $insuranceForm->member_tel_no = $request->input('member_tel_no');
    $insuranceForm->member_no = $request->input('member_no');
    $insuranceForm->member_employer_name = $request->input('member_employer_name');
    $insuranceForm->member_department_branch = $request->input('member_department_branch');
    $insuranceForm->previous_sickness = $request->boolean('previous_sickness');
    $insuranceForm->sickness_details = $request->input('sickness_details');
    $insuranceForm->diagnosis = $request->input('diagnosis');
    $insuranceForm->treatment_prescribed = $request->input('treatment_prescribed');
    $insuranceForm->medicines = $request->input('medicines');
    $insuranceForm->radiology = $request->input('radiology');
    $insuranceForm->pathology = $request->input('pathology');
    $insuranceForm->hospital_name = $request->input('hospital_name');
    $insuranceForm->consultant_referred_to = $request->input('consultant_referred_to');
    $insuranceForm->consultant_specialty = $request->input('consultant_specialty');
    $insuranceForm->medication_prescribed = $request->input('medication_prescribed');
    $insuranceForm->doctor_signature_date = $request->input('doctor_signature_date');
    $insuranceForm->member_signature_date = $request->input('member_signature_date');

    // Step 5: Save the Insurance Form
    $insuranceForm->save();

    // Redirect back or return response
    return redirect()->back();
}

    public function deleteInsurance($id)
    {

        $insuranceForm = Insurance_Form::findOrFail($id);
        $insuranceForm->delete();

        // return response()->json(['message' => 'Insurance form deleted successfully']);
        return redirect()->back();
    }

public function updateUser(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'string|max:255',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'age' => 'nullable|integer|min:1',
            'gender' => 'nullable|string|max:10',
            'marital_status' => 'nullable|string|max:20',
            'occupation' => 'nullable|string|max:100',
            'residence' => 'nullable|string|max:255',
            'next_of_kin_name' => 'nullable|string|max:255',
            'next_of_kin_email' => 'nullable|email|max:255',
            'next_of_kin_phone' => 'nullable|string|max:20',
            'next_of_kin_relationship' => 'nullable|string|max:50',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:users,email,' . $id,
        ]);

        // Update user fields
        $user->name = $request->input('name', $user->name);
        $user->age = $request->input('age', $user->age);
        $user->gender = $request->input('gender', $user->gender);
        $user->marital_status = $request->input('marital_status', $user->marital_status);
        $user->occupation = $request->input('occupation', $user->occupation);
        $user->residence = $request->input('residence', $user->residence);
        $user->next_of_kin_name = $request->input('next_of_kin_name', $user->next_of_kin_name);
        $user->next_of_kin_email = $request->input('next_of_kin_email', $user->next_of_kin_email);
        $user->next_of_kin_phone = $request->input('next_of_kin_phone', $user->next_of_kin_phone);
        $user->next_of_kin_relationship = $request->input('next_of_kin_relationship', $user->next_of_kin_relationship);
        $user->phone_number = $request->input('phone_number', $user->phone_number);
        $user->email = $request->input('email', $user->email);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo_path')) {
            $photo = $request->file('profile_photo_path');
            $photoPath = 'profile_photos/' . uniqid() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('profile_photos'), $photoPath);
            $user->profile_photo_path = $photoPath;
        }

        // Save the changes
        $user->save();
        return redirect()->back();
    }

}
