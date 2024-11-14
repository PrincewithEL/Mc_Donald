<!DOCTYPE html>
<html lang="en">
<head>
                <link rel = "icon" type = "image/jpg" href = "assets/img/mc.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McDonald Consultancy - Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
            padding: 40px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 30px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #45c9f5;
            box-shadow: 0 0 0 3px rgba(69, 201, 245, 0.2);
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background: #f8f9fa;
            border: 2px dashed #e1e1e1;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            background: #e9ecef;
        }

        .file-upload input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: #45c9f5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: #33b5e0;
            transform: translateY(-1px);
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
        }
            .button-group {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .home-btn {
        width: 30%;
        padding: 14px;
        background: #6c757d;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
    }

    .home-btn:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }

    .submit-btn {
        width: 70%;
    }

    @media (max-width: 480px) {
        .button-group {
            flex-direction: column;
        }
        .home-btn, .submit-btn {
            width: 100%;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="assets/img/mc.jpg" alt="McDonald Consultancy">
            </a>
        </div>
        <h1>Get Started</h1>
        <p class="subtitle">Join McDonald Consultancy today!</p>
         <!-- onsubmit="return validateForm()" -->
        <form id="registrationForm" action="{{ url('register-user1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="fname">Full Name</label>
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
                <label>Profile Photo</label>
                <div class="file-upload">
                    <label class="file-upload-label">
                        <span id="file-chosen">Click or drag to upload your photo</span>
                        <input type="file" id="image" name="image" accept=".jpg, .png, .jpeg" required>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" name="password" minlength="8" required>
                <p class="error-message" id="ep1">Passwords must match!</p>
            </div>

            <div class="form-group">
                <label for="cpwd">Confirm Password</label>
                <input type="password" class="form-control" id="cpwd" name="cpassword" minlength="8" required>
                <p class="error-message" id="ep">Passwords must match!</p>
            </div>

            <button type="submit" class="submit-btn">Create My Account</button>
<!--             <br>
         <a href="{{ url('/') }}" class="home-btn">Return Home</a> -->
        </form>
    </div>

    <script>
        // Update file input label when file is selected
        document.getElementById('image').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Click or drag to upload your photo';
            document.getElementById('file-chosen').textContent = fileName;
        });

        // Form validation
        function validateForm() {
            const pwd = document.getElementById("pwd").value;
            const cpwd = document.getElementById("cpwd").value;
            const error = document.getElementById("ep");
            const error1 = document.getElementById("ep1");

            if (pwd === cpwd) {
                alert("User Successfully Registered!");
                emailjs.init("1y-x1gjk-3ZTrtF64");

                const params = {
                    from_name: document.getElementById("fname").value,
                    from_email: document.getElementById("email").value,
                    message: "Thank you for creating an account with McDonald Consultancy, login to get started today!",
                    type: 'Account Registration'
                };

                emailjs.send("service_igz10ku", "template_i28u6qk", params)
                    .then(res => {
                        console.log("Email sent successfully");
                    })
                    .catch(error => {
                        console.log("Email send failed:", error);
                    });

                return true;
            } else {
                error.style.display = "block";
                error1.style.display = "block";
                return false;
            }
        }

        // Hide error messages when user starts typing
        document.getElementById("pwd").addEventListener("input", hideError);
        document.getElementById("cpwd").addEventListener("input", hideError);

        function hideError() {
            document.getElementById("ep").style.display = "none";
            document.getElementById("ep1").style.display = "none";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</body>
</html>