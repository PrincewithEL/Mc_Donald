<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    // Show the payment form
    public function showForm()
    {
        try {
            return view('payment');
        } catch (\Exception $e) {
            Log::error("Error displaying payment form: " . $e->getMessage());
            return back()->withErrors('There was an error displaying the payment form.');
        }
    }

    // Process the payment request
    public function processPayment(Request $request)
    {
        try {
            $response = Http::post('https://sandbox.intasend.com/api/v1/checkout/', [
                'public_key' => 'ISPubKey_test_146fe58b-5b1c-46aa-8af8-1d4b308569f8',
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone'),
                'host' => 'https://civrot.com',
                'amount' => $request->input('amount'),
                'currency' => 'KES',
            ]);

            if ($response->successful()) {
                // Redirect user to the payment URL returned by the API
                return redirect($response->json()['url']);
            } else {
                Log::error("IntaSend API error: " . $response->body());
                return back()->withErrors('There was an error processing your payment.');
            }
        } catch (\Exception $e) {
            Log::error("Payment processing error: " . $e->getMessage());
            return back()->withErrors('There was an error processing your payment.');
        }
    }
}
