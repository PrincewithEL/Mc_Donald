<!DOCTYPE html>
<html lang="en">
<head>
                  <link rel = "icon" type = "image/jpg" href = "assets/img/mc.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>McDonald Consultancy - Administrator Dashboard</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js'></script>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --text-color: #2c3e50;
            --sidebar-width: 250px;
            --header-height: 60px;
            --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f5f7fa;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background: white;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            width: var(--sidebar-width);
        }

        .logo img {
            height: 40px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
            gap: 20px;
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .profile-section:hover {
            background-color: #f5f7fa;
        }

        .profile-image {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            left: 0;
            top: var(--header-height);
            bottom: 0;
            width: var(--sidebar-width);
            background: white;
            padding: 20px 0;
            box-shadow: var(--card-shadow);
            overflow-y: auto;
        }

        .nav-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-color);
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .nav-item:hover {
            background-color: #f5f7fa;
        }

        .nav-item.active {
            background-color: #e3f2fd;
            color: var(--primary-color);
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 30px;
        }

        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.users {
            border-left: 4px solid var(--primary-color);
        }

        .stat-card.doctors {
            border-left: 4px solid var(--danger-color);
        }

        .stat-card.total {
            border-left: 4px solid var(--secondary-color);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-title {
            font-size: 16px;
            color: #666;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 600;
        }

        /* Footer Styles */
        .footer {
            margin-left: var(--sidebar-width);
            padding: 20px;
            text-align: center;
            color: #666;
            border-top: 1px solid #eee;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .footer {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
        /* Style the form container */
#updateUserForm {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
}

/* Label styling */
#updateUserForm label {
    font-weight: bold;
    color: #333;
}

/* Input fields and select dropdown */
#updateUserForm .form-control {
    border-radius: 5px;
    border: 1px solid #ddd;
    box-shadow: none;
}

/* Focus on form elements */
#updateUserForm .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Add padding and space between form groups */
#updateUserForm .form-group {
    margin-bottom: 20px;
}

/* Custom styling for the submit button */
.submit-button {
    text-align: center;
}

.submit-button .btn-primary {
    padding: 10px 30px;
    font-size: 16px;
    border-radius: 5px;
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s ease;
}

.submit-button .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* Style the card for "Next of Kin Information" */
.card {
    border: 1px solid #ddd;
    border-radius: 8px;
}

.card-header {
    background-color: #f1f1f1;
    font-weight: bold;
    font-size: 18px;
}

.card-body {
    padding: 20px;
}

/* Small text for form guidance */
.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

/* Responsive styles */
@media (max-width: 576px) {
    #updateUserForm {
        padding: 15px;
    }

    .submit-button .btn-primary {
        width: 100%;
    }
}

    </style>
    <!-- Font Awesome CDN Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="assets/img/mc.jpg" alt="Logo">
            <h1></h1>
        </div>
        <div class="header-content">
            <div class="profile-section">
                              <a href="{{ route('profile') }}" style="text-decoration: none; color: black;">
                <img src="user_images/{{ $userdetails->profile_photo_path }}" alt="Profile" class="profile-image">
                <span class="profile-name">{{ $userdetails->name }}</span>
            </div>
                          </a>
        </div>
    </header>

    <nav class="sidebar">
        <a href="#" onclick="setActiveNav(this); showdashboard();" class="nav-item active">
            <i class="fas fa-home"></i>
            Dashboard
        </a>
        <a href="#" onclick="setActiveNav(this); showusers();" class="nav-item">
            <i class="fas fa-users"></i>
            Users
        </a>
        <a href="#" onclick="setActiveNav(this); showbookings();" class="nav-item">
            <i class="far fa-calendar-alt"></i>
            Bookings
        </a>
        <a href="#" onclick="setActiveNav(this); showinsurance();" class="nav-item">
            <i class="fas fa-money-check"></i>
            Insurance
        </a>        
        <a href="{{ route('profile') }}" class="nav-item">
            <i class="fas fa-user"></i>
            Account
        </a>
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="nav-item" style="width: 100%; border: none; background: none; cursor: pointer; text-align: left;">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </form>
    </nav>

    <main class="main-content">
        <div class="dashboard-header">
            <h2 class="dashboard-title">Dashboard</h2>
            <p>Welcome back! Here's your overview.</p>
        </div>
<div id="board">
        <div class="stats-grid">
            <div class="stat-card total">
                <div class="stat-header">
                    <span class="stat-title">Total Users</span>
                    <div class="stat-icon" style="background: var(--secondary-color)">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $usersCount }}</div>
            </div>

            <div class="stat-card users">
                <div class="stat-header">
                    <span class="stat-title">Regular Users</span>
                    <div class="stat-icon" style="background: var(--primary-color)">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $userCount }}</div>
            </div>

            <div class="stat-card doctors">
                <div class="stat-header">
                    <span class="stat-title">Doctors</span>
                    <div class="stat-icon" style="background: var(--danger-color)">
                        <i class="fa fa-user-md"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $docCount }}</div>
            </div>
        </div>
</div>

    <style>
        :root {
            --primary-color: #4a90e2;
            --danger-color: #e74c3c;
            --success-color: #2ecc71;
            --text-color: #2c3e50;
            --border-color: #e1e8ed;
            --background-color: #f5f7fa;
            --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .content-wrapper {
            padding: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Breadcrumb */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title-icon {
            background: linear-gradient(45deg, var(--primary-color), #5ca8ff);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .breadcrumb {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Users Table */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            margin-bottom: 30px;
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--text-color);
        }

        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            background-color: var(--background-color);
            font-weight: 600;
        }

        .table tbody tr:hover {
            background-color: var(--background-color);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-admin {
            background-color: #e3f2fd;
            color: var(--primary-color);
        }

        .badge-employer {
            background-color: #e8f5e9;
            color: var(--success-color);
        }

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Registration Form */
        .form-card {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .form-control::placeholder {
            color: #95a5a6;
        }

        .submit-button {
            text-align: center;
            margin-top: 30px;
        }

        .submit-btn {
            background: linear-gradient(45deg, var(--primary-color), #5ca8ff);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        .error-text {
            color: var(--danger-color);
            font-size: 12px;
            margin-top: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 15px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .table th,
            .table td {
                padding: 10px;
            }

            .form-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
      <div id="users">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon">
                    <i class="fas fa-users"></i>
                </span>
                <span>
                    <a href="/home" style="color: inherit; text-decoration: none;">Dashboard</a> / Users Records
                </span>
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">List of Users</li>
                </ul>
            </nav>
        </div>

        <!-- Users Table Card -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users</h4>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Profile Photo</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td title="Created At: {{ $user->created_at }}">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img src="user_images/{{ $user->profile_photo_path }}" alt="Profile" class="user-avatar">
                                </td>
                                <td>
                                    <span class="badge {{ $user->user_type === 'admin' ? 'badge-admin' : 'badge-employer' }}">
                                        {{ $user->user_type }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-danger" onclick="confirmDeleteU({{ $user->id }})">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Registration Form Card -->
        <div class="card form-card">
            <div class="card-body">
                <h4 class="card-title">Register A User</h4>
                <form id="registrationForm" action="{{ url('/add_user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fname">Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="type">User Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="" selected disabled>Select A User Type</option>
                            <option value="0">Administrator</option>
                            <option value="doctor" >Doctor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Profile Photo</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png, .jpeg" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" id="pwd" name="password" minlength="8" required>
                        <p id="ep1" class="error-text" style="display: none;">Passwords must match!</p>
                    </div>

                    <div class="form-group">
                        <label for="cpwd">Confirm Password</label>
                        <input type="password" class="form-control" id="cpwd" name="cpassword" minlength="8" required>
                        <p id="ep" class="error-text" style="display: none;">Passwords must match!</p>
                    </div>

                    <div class="submit-button">
                        <button type="submit" class="submit-btn">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>
        function confirmDeleteU(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = `/deleteUser/${userId}`;
            }
        }

        function hideError() {
            document.getElementById('ep').style.display = 'none';
            document.getElementById('ep1').style.display = 'none';
        }

        // Password validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const pwd = document.getElementById('pwd').value;
            const cpwd = document.getElementById('cpwd').value;

            if (pwd !== cpwd) {
                e.preventDefault();
                document.getElementById('ep').style.display = 'block';
                document.getElementById('ep1').style.display = 'block';
            }
        });
    </script>

<div id="bookings">
 <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                Bookings Management
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">List of Bookings</li>
                </ul>
            </nav>
        </div>

        <!-- Bookings Table Card -->
        <div class="card" id="bookings">
            <div class="card-body">
                <h4 class="card-title">Bookings</h4>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Doctor</th>
                                <th>Referral Doctor</th>
                                <th>Schedule Details</th>
                                <th>Details</th>
                                <th>Doctor Feedback</th>
                                <th>Physiotherapist Feedback</th>
                                <th>Patient Feedback & Rating</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($booking as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->user->name ?? 'N/A' }}<br>{{ $book->user->phone_number ?? 'N/A' }}<br>{{ $book->user->email ?? 'N/A' }}</td>
        <td>{{ $book->doctor->name ?? 'N/A' }}<br>{{ $book->doctor->phone_number ?? 'N/A' }}<br>{{ $book->doctor->email ?? 'N/A' }}</td>
        <td>{{ $book->referralDoctor->name ?? 'N/A' }}<br>{{ $book->referralDoctor->phone_number ?? 'N/A' }}<br>{{ $book->referralDoctor->email ?? 'N/A' }}</td>
        <td>{{ $book->date }} at {{ $book->start_time }} to {{ $book->end_time }}</td>
        <td>{{ $book->details }}</td>
        <td>{{ $book->details1 }}</td>
        <td>{{ $book->details2 }}</td>  
        <td>{{ $book->rating }}/5 - {{ $book->details3 }}</td>              
        <td>{{ $book->Status }}</td>
                                <td>
                                    <button class="btn btn-danger" onclick="confirmDeleteB({{ $book->id }})">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- New Booking Form Card -->
        <div class="card form-card">
                        <div class="card-body">
                <h4 class="card-title">Schedule a New Booking</h4>
                <form id="bookingForm" action="{{ url('/insert-booking1') }}" method="POST">
@csrf
                    <div class="form-group">
                        <label for="doctor_id">Patient</label>
                        <select class="form-control" id="doctor_id" name="doctor_id" required>
                          <option value="" disabled selected>Kindly Select A Patient</option>
                          @foreach ($users as $user)
                          <?php
                          if($user['user_type'] == 'user'){
                            ?>
                          <option value="{{$user->id}}">{{$user->name}}</option>
                          <?php
                        }
                        ?>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time">
                        <small id="timeError" class="text-danger" style="display:none;color: red;">End Time must be after Start Time.</small>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="4" required></textarea>
                    </div>

                    <div class="submit-button">
                        <button type="submit" class="submit-btn">Schedule</button>
                    </div>
                </form>
            </div>
                        <div class="card-body">
                <h4 class="card-title">Complete A Booking</h4>
                <form id="bookingForm" action="{{ url('/update-booking') }}" method="POST">
@csrf
                    <div class="form-group">
                        <label for="booking_id">Booking ID</label>
                        <select class="form-control" id="booking_id" name="booking_id" required>
                          <option value="" disabled selected>Kindly Select A Booking ID</option>
                          @foreach ($booking as $book)
                          <?php
                          if($book['Status'] == 'Accepted'){
                            ?>
                          <option value="{{$book->id}}">{{$book->id}}</option>
                          <?php
                        }
                        ?>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="details1">Details</label>
                        <textarea class="form-control" id="details2" name="details2" rows="4" required></textarea>
                    </div>

                    <div class="submit-button">
                        <button type="submit" class="submit-btn">Complete</button>
                    </div>
                </form>
            </div>

<!-- Reminder Form Card -->
<div class="card form-card">
    <div class="card-body">
        <h4 class="card-title">Send Patient Reminder</h4>
        <form id="reminderForm" action="{{ url('/remind-patient') }}" method="POST">
            @csrf
                    <div class="form-group">
                        <label for="booking_id">Booking ID</label>
                        <select class="form-control" id="booking_id" name="booking_id" required>
                          <option value="" disabled selected>Kindly Select A Booking ID</option>
                          @foreach ($booking as $book)
                          <?php
                          if($book['Status'] == 'Accepted'){
                            ?>
                          <option value="{{$book->id}}">{{$book->id}}</option>
                          <?php
                        }
                        ?>
                          @endforeach
                        </select>
                    </div>
            <div class="form-group">
                <label for="details4">Reminder Message</label>
                <textarea class="form-control" id="details4" name="details4" rows="4" placeholder="Enter reminder message..."></textarea>
            </div>
            <div class="submit-button">
                <button type="submit" class="submit-btn">
                    Send Reminder
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.form-card {
    max-width: 600px;
    margin: 2rem auto;
}

.card-body {
    padding: 2rem;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: #333;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #374151;
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.2s;
}

.form-control:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M8 11.5l-4-4h8l-4 4z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

.submit-button {
    margin-top: 2rem;
}

.submit-btn {
    width: 100%;
    padding: 0.75rem;
    background-color: #2563eb;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s;
}

.submit-btn:hover {
    background-color: #1d4ed8;
}

.error-text {
    color: #dc2626;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

@media (max-width: 640px) {
    .card-body {
        padding: 1.5rem;
    }
}
</style>
        </div>
    </div>
</div>
<script>
    function confirmDeleteB(bookingId) {
        if (confirm('Are you sure you want to delete this booking?')) {
            // Create a form element
            const form = document.createElement('form');
            form.action = `/delete-booking/${bookingId}`;
            form.method = 'POST';

            // Add the DELETE method override
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            // Add the CSRF token
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}'; // Blade syntax for CSRF token
            form.appendChild(csrfInput);

            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

<div id="insurance">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Insurance Forms</h4>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Practitioner Name</th>
                        <th>Member Name</th>
                        <th>Patient Name</th>
                        <th>Hospital</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                    <tr>
                        <td title="Created At: {{ $form->created_at }}">{{ $form->id }}</td>
                        <td>{{ $form->practitioner_name }}</td>
                        <td>{{ $form->member_full_name }}</td>
                        <td>{{ $form->patient_full_name }}</td>
                        <td>{{ $form->hospital_name }}</td>
                        <td>
                            <!-- Individual Print Button for each row -->
                            <button class="btn btn-primary" onclick="printRow('row_{{ $form->id }}')">Print</button>

                            <form action="{{ route('insurance.delete', $form->id) }}" method="POST" onsubmit="return confirmDeleteI(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Hidden Printable Content for Each Row -->
                    <div id="row_{{ $form->id }}" class="printable-row" style="display: none;">
                        <h4>Insurance Form Details</h4>
                        <p><strong>Practitioner Name:</strong> {{ $form->practitioner_name }}</p>
                        <p><strong>Postal Address:</strong> {{ $form->postal_address }}</p>
                        <p><strong>Phone Number:</strong> {{ $form->tel_no }}</p>
                        <p><strong>Mobile Number:</strong> {{ $form->mobile }}</p>
                        <p><strong>Email:</strong> {{ $form->email }}</p>
                        <p><strong>Patient Name:</strong> {{ $form->patient_full_name }}</p>
                        <p><strong>Patient Date of Birth:</strong> {{ $form->patient_date_of_birth }}</p>
                        <p><strong>Member Name:</strong> {{ $form->member_full_name }}</p>
                        <p><strong>Member Phone Number:</strong> {{ $form->member_tel_no }}</p>
                        <p><strong>Member Number:</strong> {{ $form->member_no }}</p>
                        <p><strong>Employer Name:</strong> {{ $form->member_employer_name }}</p>
                        <p><strong>Department / Branch:</strong> {{ $form->member_department_branch }}</p>
                        <p><strong>Previous Sickness:</strong> {{ $form->previous_sickness ? 'Yes' : 'No' }}</p>
                        <p><strong>Sickness Details:</strong> {{ $form->sickness_details }}</p>
                        <p><strong>Diagnosis:</strong> {{ $form->diagnosis }}</p>
                        <p><strong>Treatment Prescribed:</strong> {{ $form->treatment_prescribed }}</p>
                        <p><strong>Medicines:</strong> {{ $form->medicines }}</p>
                        <p><strong>Radiology:</strong> {{ $form->radiology }}</p>
                        <p><strong>Pathology:</strong> {{ $form->pathology }}</p>
                        <p><strong>Hospital Name:</strong> {{ $form->hospital_name }}</p>
                        <p><strong>Consultant Referred To:</strong> {{ $form->consultant_referred_to }}</p>
                        <p><strong>Consultant Specialty:</strong> {{ $form->consultant_specialty }}</p>
                        <p><strong>Medication Prescribed:</strong> {{ $form->medication_prescribed }}</p>
                        <p><strong>Doctor's Signature Date:</strong> {{ $form->doctor_signature_date }}</p>
                        <p><strong>Member's Signature Date:</strong> {{ $form->member_signature_date }}</p>
                        <p><strong>Doctor's Signature:</strong><br>
                            <img src="signatures/doctor/{{ $form->doctor_signature }}" alt="Doctor's Signature" style="max-width: 100%; height: auto;">
                        </p>
                        <p><strong>Member's Signature:</strong><br>
                            <img src="signatures/member/{{ $form->member_signature }}" alt="Member's Signature" style="max-width: 100%; height: auto;">
                        </p>
                        <p><strong>Practitioner Stamp:</strong><br>
                            <img src="stamps/{{ $form->practitioner_stamp }}" alt="Practitioner Stamp" style="max-width: 100%; height: auto;">
                        </p>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

<!-- Insurance Form Registration -->
<div class="card form-card">
    <div class="card-body">
<h4 class="card-title">Register Insurance Form</h4>
<form id="insuranceForm" action="{{ url('/insurance_create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="practitioner_name">Practitioner Name*</label>
        <input type="text" class="form-control" id="practitioner_name" name="practitioner_name" required>
    </div>

    <div class="form-group">
        <label for="postal_address">Postal Address*</label>
        <input type="text" class="form-control" id="postal_address" name="postal_address" required>
    </div>

    <div class="form-group">
        <label for="tel_no">Phone Number</label>
        <input type="tel" class="form-control" id="tel_no" name="tel_no">
    </div>

    <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="tel" class="form-control" id="mobile" name="mobile">
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="patient_full_name">Patient Name*</label>
        <input type="text" class="form-control" id="patient_full_name" name="patient_full_name" required>
    </div>

    <div class="form-group">
        <label for="patient_date_of_birth">Patient Date of Birth*</label>
        <input type="date" class="form-control" id="patient_date_of_birth" name="patient_date_of_birth" required>
    </div>

    <div class="form-group">
        <label for="member_full_name">Member Name</label>
        <input type="text" class="form-control" id="member_full_name" name="member_full_name">
    </div>

    <div class="form-group">
        <label for="member_tel_no">Member Phone Number</label>
        <input type="tel" class="form-control" id="member_tel_no" name="member_tel_no">
    </div>

    <div class="form-group">
        <label for="member_no">Member Number</label>
        <input type="text" class="form-control" id="member_no" name="member_no">
    </div>

    <div class="form-group">
        <label for="member_employer_name">Employer Name</label>
        <input type="text" class="form-control" id="member_employer_name" name="member_employer_name">
    </div>

    <div class="form-group">
        <label for="member_department_branch">Department / Branch</label>
        <input type="text" class="form-control" id="member_department_branch" name="member_department_branch">
    </div>

    <div class="form-group">
        <label for="previous_sickness">Previous Sickness</label>
        <select class="form-control" id="previous_sickness" name="previous_sickness">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="form-group">
        <label for="sickness_details">Sickness Details</label>
        <textarea class="form-control" id="sickness_details" name="sickness_details" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="diagnosis">Diagnosis</label>
        <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="treatment_prescribed">Treatment Prescribed</label>
        <textarea class="form-control" id="treatment_prescribed" name="treatment_prescribed" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="medicines">Medicines</label>
        <select class="form-control" id="medicines" name="medicines">
            <option value="None">None</option>
            <option value="Prescription">Prescription</option>
            <option value="Injection">Injection</option>
            <option value="Dispensed">Dispensed</option>
        </select>
    </div>

    <div class="form-group">
        <label for="radiology">Radiology</label>
        <select class="form-control" id="radiology" name="radiology">
            <option value="">Select Option</option>
            <option value="X-Ray">X-Ray</option>
            <option value="MRI/Cat Scan">MRI/Cat Scan</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pathology">Pathology</label>
        <select class="form-control" id="pathology" name="pathology">
            <option value="">Select Option</option>
            <option value="Haematology">Haematology</option>
            <option value="Microbiology">Microbiology</option>
            <option value="Biochemistry">Biochemistry</option>
            <option value="Histology">Histology</option>
        </select>
    </div>

    <div class="form-group">
        <label for="hospital_name">Hospital Name</label>
        <input type="text" class="form-control" id="hospital_name" name="hospital_name">
    </div>

    <div class="form-group">
        <label for="consultant_referred_to">Consultant Referred To</label>
        <input type="text" class="form-control" id="consultant_referred_to" name="consultant_referred_to">
    </div>

    <div class="form-group">
        <label for="consultant_specialty">Consultant Specialty</label>
        <input type="text" class="form-control" id="consultant_specialty" name="consultant_specialty">
    </div>

    <div class="form-group">
        <label for="medication_prescribed">Medication Prescribed</label>
        <textarea class="form-control" id="medication_prescribed" name="medication_prescribed" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="practitioner_stamp">Practitioner Stamp</label>
        <input type="file" class="form-control" id="practitioner_stamp" name="practitioner_stamp" accept=".jpg, .png, .jpeg">
    </div>

    <div class="form-group">
        <label for="doctor_signature">Doctor Signature</label>
        <input type="file" class="form-control" id="doctor_signature" name="doctor_signature" accept=".jpg, .png, .jpeg">
    </div>

    <div class="form-group">
        <label for="doctor_signature_date">Doctor Signature Date</label>
        <input type="date" class="form-control" id="doctor_signature_date" name="doctor_signature_date">
    </div>

    <div class="form-group">
        <label for="member_signature">Member Signature</label>
        <input type="file" class="form-control" id="member_signature" name="member_signature" accept=".jpg, .png, .jpeg">
    </div>

    <div class="form-group">
        <label for="member_signature_date">Member Signature Date</label>
        <input type="date" class="form-control" id="member_signature_date" name="member_signature_date">
    </div>

    <div class="submit-button">
        <button type="submit" class="submit-btn">
            Create Insurance Form
        </button>
    </div>
</form>
    </div>
</div>

    </div>
</div>
</div>
<script>
    function confirmDeleteI(event) {
        if (!confirm('Are you sure you want to delete this insurance form?')) {
            event.preventDefault();
        }
    }

    // Function to print each row
    function printRow(rowId) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(rowId).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>


    </main>

    <footer class="footer">
        <p>&copy; 2024 McDonald Consultancy. All Rights Reserved.</p>
    </footer>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle')?.addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            if (window.innerWidth <= 768 && 
                !sidebar?.contains(e.target) && 
                !menuToggle?.contains(e.target)) {
                sidebar?.classList.remove('active');
            }
        });
    </script>
    <script>
document.getElementById('start_time').addEventListener('change', validateTime);
document.getElementById('end_time').addEventListener('change', validateTime);

function validateTime() {
    const startTime = document.getElementById('start_time').value;
    const endTime = document.getElementById('end_time').value;
    const timeError = document.getElementById('timeError');
    
    // Show error message if end time is before start time
    if (startTime && endTime && endTime <= startTime) {
        timeError.style.display = 'block';
        document.getElementById('end_time').setCustomValidity('End Time must be after Start Time.');
    } else {
        timeError.style.display = 'none';
        document.getElementById('end_time').setCustomValidity('');
    }
}
</script>
    <script type="text/javascript">
document.getElementById('board').style.display = 'block';
document.getElementById('bookings').style.display = 'none';
document.getElementById('insurance').style.display = 'none';
document.getElementById('users').style.display = 'none';
function showusers() {
document.getElementById('board').style.display = 'none';
document.getElementById('bookings').style.display = 'none';
document.getElementById('insurance').style.display = 'none';
document.getElementById('users').style.display = 'block';  
}
function showbookings() {
document.getElementById('board').style.display = 'none';
document.getElementById('bookings').style.display = 'block';
document.getElementById('insurance').style.display = 'none';
document.getElementById('users').style.display = 'none';  
}
function showinsurance() {
document.getElementById('board').style.display = 'none';
document.getElementById('bookings').style.display = 'none';
document.getElementById('insurance').style.display = 'block';
document.getElementById('users').style.display = 'none';  
}
function showdashboard() {
document.getElementById('board').style.display = 'block';
document.getElementById('bookings').style.display = 'none';
document.getElementById('insurance').style.display = 'none';
document.getElementById('users').style.display = 'none';  
}
function setActiveNav(element) {
    // Remove active class from all nav items
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Add active class to clicked item
    element.classList.add('active');
}
    </script>
</body>
</html>