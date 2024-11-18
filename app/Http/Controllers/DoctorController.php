<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\Insurance_Form;
use App\Mail\ReminderMail;  // Import the ReminderMail Mailable class
use Illuminate\Support\Facades\Mail;  // Import the Mail facade

class DoctorController extends Controller
{

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

    public function referDoctor(Request $request)
{

    $id = $request->input('booking_id');

    $booking = Bookings::findOrFail($id);

    $validatedData = $request->validate([
        'referral_doctor_id' => 'nullable|string|max:255',
        'details1' => 'nullable|string|max:255',
    ]);

    $booking->referral_doctor_id = $validatedData['referral_doctor_id'];
    $booking->details1 = $validatedData['details1'];
    $booking->Status = 'Accepted';

    $booking->save();

    // return response()->json(['message' => 'Booking updated successfully', 'booking' => $booking]);
    return redirect()->back();
}

    public function rateDoctor(Request $request)
{

    $id = $request->input('booking_id');

    $booking = Bookings::findOrFail($id);

    $booking->details3 = $request->input('details3');
    $booking->rating = $request->input('rate');

    $booking->save();

    // return response()->json(['message' => 'Booking updated successfully', 'booking' => $booking]);
    return redirect()->back();
}

public function remindPatient(Request $request)
{
    // Step 1: Retrieve the booking using the booking ID from the request
    $id = $request->input('booking_id');
    $booking = Bookings::findOrFail($id);

    // Step 2: Update the booking details (message)
    $booking->details4 = $request->input('details4');
    $booking->save();

    // Step 3: Retrieve the user's email from the booking's user relationship
    $user = $booking->user;

    // Step 4: If the user exists, send the reminder email
    if ($user) {
        // Prepare the reminder message (details4)
        $reminderMessage = $request->input('details4');
        
        // Send the email using the ReminderMail mailable class
        // Mail::to($user->email)->send(new ReminderMail($reminderMessage));
    }

    // Step 5: Redirect back with a success message
    return redirect()->back()->with('success', 'Reminder sent successfully!');
}


  
}
