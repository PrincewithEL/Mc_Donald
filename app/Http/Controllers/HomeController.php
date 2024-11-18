<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Bookings;
use App\Models\Insurance_Form;
use App\Models\Therapist__Sessions;


class HomeController extends Controller
{
    public function redirect(){


        if (Auth::id()) {
            if (Auth::user()->user_type=='0') {
                    // Retrieve all bookings that are not "Completed"
    $unavailableBookings = Bookings::where('status', '!=', 'Completed')->get();
    
    // Get the start and end times from unavailable bookings
    $unavailableTimes = [];
    foreach ($unavailableBookings as $booking) {
        $unavailableTimes[] = $booking->start_time; // You could store both start and end times if necessary
        $unavailableTimes[] = $booking->end_time;
    }
    $startTime = $booking->start_time;  // Start time of the booking
    $endTime = $booking->end_time;     
                        $users = user::all();
                       $booking = Bookings::with(['user', 'doctor', 'referralDoctor'])->get();
                        $forms = Insurance_Form::all();
                        // $sessions = Therapist__Sessions::all();
                        $userId = auth()->id();
                        $usersCount = user::all()->count();
                        $userdetails = User::where('id', $userId)->first();
                        $userCount = user::where('user_type', 'user')->count();
                        $docCount = user::where('user_type','doctor')->count();
                        $doctors = user::where('user_type','doctor')->get();
                        $admins = user::where('user_type','0')->get();
                        return view('admin.home', compact('docCount', 'userCount', 'userdetails', 'usersCount', 'users', 'booking', 'forms', 'doctors', 'admins', 'unavailableTimes', 'startTime', 'endTime'));
                    } 
        else if (Auth::user()->user_type=='doctor') {
                // Retrieve all bookings that are not "Completed"
    $unavailableBookings = Bookings::where('status', '!=', 'Completed')->get();
    
    // Get the start and end times from unavailable bookings
    $unavailableTimes = [];
    foreach ($unavailableBookings as $booking) {
        $unavailableTimes[] = $booking->start_time; // You could store both start and end times if necessary
        $unavailableTimes[] = $booking->end_time;
    }
    $startTime = $booking->start_time;  // Start time of the booking
    $endTime = $booking->end_time;     
// Fetch all users
$users = User::all();

// Get the authenticated user's ID
$userId = auth()->id();

// Fetch the user details based on the provided user ID
$userdetails = User::where('id', $userId)->first();

// Get bookings for the doctor (with related user, doctor, and referral doctor)
$booking = Bookings::with(['user', 'doctor', 'referralDoctor'])
                    ->where('doctor_id', $userId)
                    ->get();

// Get insurance forms for the user based on the member's full name
$forms = Insurance_Form::where('member_full_name', $userdetails->name)->get();

// Fetch the total number of bookings
$bookingCount = Bookings::count();  // More efficient than Bookings::all()->count()

// Average rating logic - assuming you want the average rating for bookings related to the user
$avgRating = Bookings::where('user_id', $userId)
                     ->avg('rating');  // Assuming 'rating' is a column in the Bookings table

// Count the active bookings for the authenticated user (correct user_type logic)
$activeBooking = Bookings::whereIn('Status', ['Active', 'Accepted'])
                         ->where('user_id', $userId)
                         ->count();

// Get all doctors (users with the 'doctor' user type)
$doctors = User::where('user_type', 'doctor')->get();

// Get all admins (users with the '0' user type)
$admins = User::where('user_type', '0')->get();
                  
                        return view('doctor.home', compact('bookingCount', 'avgRating', 'userdetails', 'activeBooking', 'users', 'booking', 'forms', 'doctors', 'admins', 'unavailableTimes', 'startTime', 'endTime'));
                    }    
        
        else if (Auth::user()->user_type=='user') {

                // Retrieve all bookings that are not "Completed"
    $unavailableBookings = Bookings::where('status', '!=', 'Completed')->get();
    
    // Get the start and end times from unavailable bookings
    $unavailableTimes = [];
    foreach ($unavailableBookings as $booking) {
        $unavailableTimes[] = $booking->start_time; // You could store both start and end times if necessary
        $unavailableTimes[] = $booking->end_time;
    }
   $startTime = $booking->start_time;  // Start time of the booking
    $endTime = $booking->end_time;  
// Fetch all users (with proper capitalization of the User model)
$users = User::all();

// Get the authenticated user's ID (this should be done after fetching $userId, not before)
$userId = auth()->id();

// Fetch the user details for the specific user based on user ID
$userdetails = User::where('id', $userId)->first();

// Fetch bookings for the user (with relationships like user, doctor, and referral doctor)
$booking = Bookings::with(['user', 'doctor', 'referralDoctor'])
                   ->where('user_id', $userId)
                   ->get();

// Fetch bookings where the status is not 'Completed' and 'details4' is not null
$bookings = Bookings::where('Status', '!=', 'Completed')
                    ->whereNotNull('details4')  // Ensure 'details4' is not null
                    ->get();

// Fetch insurance forms for the user based on their full name (this needs to be checked correctly)
$forms = Insurance_Form::where('patient_full_name', $userdetails->name)->get();

// Get the total count of bookings
$bookingCount = Bookings::count();

// Get the count of completed bookings for the authenticated user
$completedBooking = Bookings::where('Status', 'Completed')
                             ->where('user_id', $userId)
                             ->count();

// Get the count of active or accepted bookings for the authenticated user
$activeBooking = Bookings::whereIn('Status', ['Accepted', 'Active'])
                          ->where('user_id', $userId)
                          ->count();

// Get doctors (users with the 'doctor' user type)
$doctors = User::where('user_type', 'doctor')->get();

// Get admins (users with the '0' user type)
$admins = User::where('user_type', '0')->get();

// Pass the data to the view
return view('user.home', compact('userdetails', 'users', 'booking', 'bookings', 'forms', 'doctors', 'admins', 'bookingCount', 'completedBooking', 'activeBooking', 'unavailableTimes', 'startTime', 'endTime'));

                    }    
        
        else{
                   return view('users.home');
        }

    }
}
        public function index(){
        return view('users.home');
    }

            public function register(){
        return view('users.register');
    }
    
}