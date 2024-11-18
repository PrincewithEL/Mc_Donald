
<div class="container">
    <h1>Pay with <span>Mpesa/Bank</span></h1>

    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <!-- First Name -->
        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
        
        <!-- Last Name -->
        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
        
        <!-- Phone -->
        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
        
        <!-- Email -->
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        
        <!-- Amount -->
        <input type="number" name="amount" value="{{ old('amount') }}" placeholder="Amount" required>
        
        <!-- Submit Button -->
        <button type="submit">Pay</button>
    </form>

   @error('payment')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- IntaSend Trust Badge -->
    <div style="text-align:center; margin-top: 1em;">
        <a href="https://intasend.com/security" target="_blank" rel="noopener noreferrer">
            <img src="https://intasend-prod-static.s3.amazonaws.com/img/trust-badges/intasend-trust-badge-no-mpesa-hr-dark.png" alt="IntaSend Secure Payments (PCI-DSS Compliant)" width="375" height="50">
        </a>
        <strong>
            <a href="https://intasend.com/security" target="_blank" rel="noopener noreferrer" style="color: #fafafa; font-size: 0.8em; margin-top: 0.6em;">Secured by IntaSend Payments</a>
        </strong>
    </div>
</div>
