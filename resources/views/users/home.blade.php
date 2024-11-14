<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McDonald Consultancy - Homepage</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --light: #f8fafc;
            --dark: #0f172a;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark);
        }

        /* Utility Classes */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        /* Header Styles */
        header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: var(--dark);
        }

        .logo img {
            height: 40px;
            border-radius: 50%;
        }

        nav ul {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        nav a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: var(--primary);
        }

        .mobile-menu {
            display: none;
        }

        /* Hero Section */
        .hero {
            padding: 8rem 0 4rem;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Services Section */
        .services {
            padding: 6rem 0;
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        /* Contact Section */
        .contact {
            padding: 6rem 0;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info {
            display: grid;
            gap: 2rem;
        }

        .contact-item {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 4rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid #334155;
            text-align: center;
            color: #94a3b8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }

            nav ul {
                display: none;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--primary);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .back-to-top:hover {
            background: var(--primary-dark);
        }
    </style>
        <link rel = "icon" type = "image/jpg" href = "assets/img/mc.jpg">
    <!-- For apple devices -->
    <link rel = "apple-touch-icon" type = "image/jpg" href = "assets/img/mc.jpg"/>
    
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">
                    <img src="assets/img/mc.jpg" alt="McDonald Consultancy">
                    <span>McDonald Consultancy</span>
                </a>
                <nav>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="{{ url ('login') }}" class="btn btn-primary">Login</a></li>
                        <li><a href="{{ url ('register') }}" class="btn btn-primary">Register</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Welcome to McDonald Consultancy</h1>
                    <p>Professional physiotherapy services focused on your recovery and well-being.</p>
                    <a href="#services" class="btn btn-primary">Our Services</a>
                </div>
                <div class="hero-image">
                    <img src="assets/img/hero-bg.jpg" alt="Physiotherapy Services">
                </div>
            </div>
        </div>
    </section>


 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/McDonald.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
              <p><b> Welcome to McDonald Consultancy. I am McDonald Wandere, an experienced specialist in physiotherapy.</b></p>
              <li><b><i class="bi bi-chevron-right"></i>Our Mission</b>
              <p>To offer evidence based, efficient and effective patient centered physiotherapy services to the world.</p>
              <li><b><i class="bi bi-chevron-right"></i>Our Vision</b>
              <p>Leader in rehabilitation health service</p>
              <li><b><i class="bi bi-chevron-right"></i>Our Values </b> 
              <p>-Professionalism</p>
              <p>-Integrity</p>
              <p>-Compassion</p>
              <p>-Client centered</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="services" class="services">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>We provide first-class physiotherapy treatments tailored to your needs</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">👩</div>
                    <h3>Women's Health</h3>
                    <p>Specialized care including pelvic floor therapy and pre/post-natal care</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🦴</div>
                    <h3>Back & Neck Pain</h3>
                    <p>Expert treatment for chronic pain and injuries</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">💪</div>
                    <h3>Shoulder Pain</h3>
                    <p>Rehabilitation for frozen shoulder and joint issues</p>
                </div>
                <div class="service-card">
    <div class="service-icon">🧬</div>
    <h3>Special Packages</h3>
    <p>Includes Joint Replacement (TKR/THR), Joint Reconstruction & Stroke</p>
</div>

<div class="service-card">
    <div class="service-icon">🦽</div>
    <h3>Knee and Hip Replacement</h3>
    <p>Includes Arthritis, Tendinitis, Ligament Injury, Meniscus Injury, Post Fracture Stiffness & Knee Replacement</p>
</div>

<div class="service-card">
    <div class="service-icon">📋</div>
    <h3>Special Classes</h3>
    <p>Includes Antenatal/Postnatal Exercises, Lifestyle Management & Ergonomics</p>
</div>

                <!-- Additional service cards -->
            </div>
        </div>
    </section>
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>These are visuals of some of the procedures and services we provide.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%201.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%201.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%202.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%202.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%203.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%203.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%204.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%204.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%205.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%205.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%206.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%206.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%207.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%207.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/physio%208.jpg" class="galelry-lightbox">
                <img src="assets/img/physio%208.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Get in touch with us today</p>
            </div>
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div>
                            <h3>Location</h3>
                            <p>Nairobi South Clinic, Muhoho Avenue, South C</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📧</div>
                        <div>
                            <h3>Email</h3>
                            <p>mcdonaldwandere@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div>
                            <h3>Phone</h3>
                            <p>+254 725 059381</p>
                        </div>
                    </div>
                </div>
                <form class="contact-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <textarea rows="5" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
                                                  <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.768369685385!2d36.82686851475417!3d-1.3144831990412746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11ab99c6a777%3A0x470ed980d201df7b!2sThe%20Nairobi%20South%20Hospital!5e0!3m2!1sen!2ske!4v1655664709027!5m2!1sen!2ske" width="580" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3>McDonald Consultancy</h3>
                    <p>Professional physiotherapy services focused on your recovery and well-being.</p>
                </div>
                <div>
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Opening Hours</h3>
                    <p>Monday - Sunday<br>7:00 AM - 7:00 PM</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 McDonald Consultancy. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top">↑</a>
</body>
</html>