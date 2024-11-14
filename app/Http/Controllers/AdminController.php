<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Bookings;

use App\Models\Insurance_Form;

class AdminController extends Controller
{

    public function logout(){
        session()->forget('adminLogin');
        return redirect('/login');
    }
    
     public function registerUser(Request $request){
        $user = new user;
        $file = \Request::file('image');
        $destination = 'user_images';
        $ext= $file->getClientOriginalExtension();
        $mainFilename = Str::random(40).date('h-i-s').".".$ext;
        $file->move($destination, $mainFilename);

        $name = $request->input('fname');
        $phone_number = $request->input('phone');
        $user_type = $request->input('type');
        $email = $request->input('email');
        $password=Hash::make($request->input('password'));

        $user->profile_photo_path=$mainFilename;
        $user->name=$name;
        $user->phone_number=$phone_number;
        $user->user_type=$user_type;
        $user->email=$email;
        $user->password=$password;

        $user->save();

        return redirect()->back();
    }

         public function registerUser1(Request $request){
        $user = new user;
        $file = \Request::file('image');
        $destination = 'user_images';
        $ext= $file->getClientOriginalExtension();
        $mainFilename = Str::random(40).date('h-i-s').".".$ext;
        $file->move($destination, $mainFilename);

        $name = $request->input('fname');
        $phone_number = $request->input('phone');
        $user_type = 'user';
        $email = $request->input('email');
        $password=Hash::make($request->input('password'));

        $user->profile_photo_path=$mainFilename;
        $user->name=$name;
        $user->phone_number=$phone_number;
        $user->user_type=$user_type;
        $user->email=$email;
        $user->password=$password;

        $user->save();

        // return view('users.home');
        return redirect('/login');
    }

         public function updateUser(Request $request){
        $id = $request->input('uid');
        $user = user::find($id);
        $file = \Request::file('image');
        $destination = 'user_images';
        $ext= $file->getClientOriginalExtension();
        $mainFilename = Str::random(40).date('h-i-s').".".$ext;
        $file->move($destination, $mainFilename);

        $name = $request->input('fname');
        $phone_number = $request->input('phone');
        // $user_type = $request->input('user_type');
        $user_type = 'employer';
        $email = $request->input('email');
        $password=Hash::make($request->input('password'));

        $user->profile_photo_path=$mainFilename;
        $user->name=$name;
        $user->phone_number=$phone_number;
        $user->user_type=$user_type;
        $user->email=$email;
        $user->password=$password;

        $user->save();

        return redirect()->back();
    }

        public function deleteUser($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

 public function createInsurance(Request $request)
    {
        
        $insuranceForm = new Insurance_Form;

        
        $stampFile = $request->file('practitioner_stamp');
        if ($stampFile) {
            $destination = 'stamps';
            $stampFilename = uniqid() . '_' . $stampFile->getClientOriginalName();
            $stampFile->move($destination, $stampFilename);
            $insuranceForm->practitioner_stamp = $stampFilename;
        }

        
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
        $insuranceForm->doctor_signature = $request->input('doctor_signature');
        $insuranceForm->doctor_signature_date = $request->input('doctor_signature_date');
        $insuranceForm->member_signature = $request->input('member_signature');
        $insuranceForm->member_signature_date = $request->input('member_signature_date');

        
        $insuranceForm->save();

       
        // return response()->json(['message' => 'Insurance form created successfully'], 201);
        return redirect()->back();
    }

    public function deleteInsurance($id)
    {

        $insuranceForm = Insurance_Form::findOrFail($id);
        $insuranceForm->delete();

        // Step 2: Return Response
        // return response()->json(['message' => 'Insurance form deleted successfully']);
        return redirect()->back();
    }

    public function updateBookingStatus(Request $request)
{

    $id = $request->input('booking_id');
    $booking = Bookings::findOrFail($id);

    $booking->Status = 'Completed';
    $booking->details2 = $request->input('details2');

    $booking->save();

    return redirect()->back();
}

}
