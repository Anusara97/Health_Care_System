@include('cdn')
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" width="60" height="70" class="me-3">
            <div class="text-start">
                <p class="mb-0 fw-bold text-black" style="font-size: 1.5rem;">Health Care Management System</p>
                <p class="mb-0 text-muted" style="font-size: 0.9rem;">ABC Hospital - Matara</p>
            </div>
        </a>

        <div class="d-flex align-items-center">
            <a class="btn custom-btn me-2" href="{{ url('/register') }}">Sign up</a>
            <a class="btn custom-btn" href="{{ url('/login') }}">Sign in</a>
        </div>
    </div>
</nav>

<style>
    .custom-btn {
        background-color: #87CEEB;
        color: #003366;
        padding: 10px 20px;
        font-weight: bold;
        text-align: center;
        border-radius: 5px;
    }

    .custom-btn:hover {
        background-color: #62B2DB;
        color: white;
    }

    #carouselExampleCaptions .carousel-inner img {
        height: 60vh; /* Proper height for images */
        object-fit: cover;
    }

    #carouselExampleCaptions {
        margin-bottom: 30px; /* Space below the carousel */
    }

    /* Body section styling */
    .page-body {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .tile {
        width: 300px;
        transition: transform 0.3s;
    }

    .tile:hover {
        transform: scale(1.05);
    }

    .vision-mission-section {
        flex-wrap: wrap;
    }

    /* Footer styling */
    footer {
        background-color: #2C3E50;
        color: white;
        padding: 30px 20px;
        text-align: center;
    }

    footer a {
        color: #ddd;
        text-decoration: none;
    }

    footer a:hover {
        color: white;
    }
</style>

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/Hospital.jpg') }}" class="d-block w-100" alt="Hospital">
            <div class="carousel-caption d-none d-md-block">
                <h4>Pharmacy</h4>                
                <p>Our fully stocked in-house pharmacy ensures that patients receive prescribed medications promptly and efficiently. From over-the-counter drugs to specialized prescriptions, our pharmacists are here to guide you with expert advice and support.</p>                
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Medicine.jpg') }}" class="d-block w-100" alt="Medicine">
            <div class="carousel-caption d-none d-md-block">
                <h4>Medicine</h4>
                <p>With a focus on holistic wellness, our medicine department offers consultations, diagnosis, and treatments for a wide array of medical conditions. Our expert physicians are committed to providing personalized care and ensuring your health is our top priority</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Dental.jpg') }}" class="d-block w-100" alt="Dental Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>Dental Clinic</h4>
                <p>Your oral health matters to us! Our dental clinic provides services ranging from routine check-ups to advanced dental procedures, including cleaning, fillings, extractions, and cosmetic dentistry. Experience care with a smile.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Eye.jpg') }}" class="d-block w-100" alt="Eye Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>Eye Clinic</h4>
                <p>See the world clearly with our comprehensive eye care services. Our specialists handle everything from routine vision tests to the treatment of complex eye conditions, ensuring the health and well-being of your eyes.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Ear.jpg') }}" class="d-block w-100" alt="Ent Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>ENT Clinic</h4>
                <p>Our Ear, Nose, and Throat (ENT) clinic is equipped to diagnose and treat conditions related to these vital sensory and functional organs. From hearing loss to sinus issues, our specialists are here to restore your comfort and health.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Orthopedic.jpg') }}" class="d-block w-100" alt="Orthopedic Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>Orthopedic Clinic</h4>
                <p>Regain mobility and strength with our specialized orthopedic care. We treat bone and joint disorders, fractures, and sports injuries, helping you get back to your active life with confidence.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="page-body">
    <h1 class="text-center">Welcome to the <br> Health Care Management System</h1>
    <p class="text-center">
        This system helps you access and manage the mental and physical health of patients. <br>
        Our aim is to provide efficient and accessible services for all medical and non-medical staff.
    </p>

    <div class="vision-mission-section d-flex justify-content-center gap-3 mt-5">
        <div class="tile bg-light p-4 rounded shadow-sm text-center">
            <h3 class="text-primary">Vision</h3>
            <p>To be a leading healthcare management system that empowers hospitals to achieve excellence in patient care, fosters innovation in health services, and ensures accessibility, efficiency, and satisfaction for all stakeholders.</p>
        </div>
        <div class="tile bg-light p-4 rounded shadow-sm text-center">
            <h3 class="text-success">Mission</h3>
            <p>To provide comprehensive, patient-centered healthcare solutions that ensure the seamless management of mental and physical well-being, enabling medical and non-medical staff to deliver efficient, compassionate, and quality care to all.</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 ABC Hospital - Matara. All rights reserved.</p>
    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</footer>