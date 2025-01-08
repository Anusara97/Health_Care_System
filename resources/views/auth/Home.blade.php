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
                <h4>ABC Hospital</h4>
                <h6>Vision</h6>
                <p></p>
                <h6>Mission</h6>
                <p></p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Medicine.jpg') }}" class="d-block w-100" alt="Medicine">
            <div class="carousel-caption d-none d-md-block">
                <h4>Medicine</h4>
                <p>Medicine is the field of health and healing. It includes nurses, doctors, and various specialists. It covers diagnosis, treatment, and prevention of disease, medical research, and many other aspects of health.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Dental.jpg') }}" class="d-block w-100" alt="Dental Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>Dental Clinic</h4>
                <p>A dental clinic is a healthcare facility where dentists and dental staff provide oral health care and treatments. Dental clinics offer a range of dental services, including checkups, fillings, root canals, and more. They may also provide emergency care after hours</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Eye.jpg') }}" class="d-block w-100" alt="Eye Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>Eye Clinic</h4>
                <p>An eye clinic is a medical facility that provides specialized care for the eyes, including diagnosis, treatment, and investigation of minor eye disorders. Eye clinics are run by a group of medical specialists.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Ear.jpg') }}" class="d-block w-100" alt="Ent Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>ENT Clinic</h4>
                <p>An ear, nose, and throat (ENT) clinic is a medical facility that treats patients with a range of ear, nose, and throat issues.
                    ENT clinics can provide diagnostic, medical, and surgical services. They may also work closely with other specialists, such as audiologists, neurosurgeons, and plastic surgeons.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/Orthopedic.jpg') }}" class="d-block w-100" alt="Orthopedic Clinic">
            <div class="carousel-caption d-none d-md-block">
                <h4>Orthopedic Clinic</h4>
                <p>The Department of Zoology conducts courses covering basic and applied fields of Zoology for undergraduate students registered for B.Sc. General Degree and B.Sc. Special Degree programs.</p>
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

<!-- Page Body -->
<div class="page-body">
    <h1 class="text-center">Welcome to the <br> Health Care Management System</h1>
    <p class="text-center">
        This system helps you access and manage the mental and physical health of patients. <br>
        Our aim is to provide efficient and accessible services for all medical and non-medical staff.
    </p>

    <h3 style="text-align: center">Vision</h3>
    <p style="text-align: center">To be a leading healthcare management system that empowers hospitals to achieve excellence in patient care, fosters innovation in health services, and ensures accessibility, efficiency, and satisfaction for all stakeholders.</p><br>
    <h3 style="text-align: center">Mission</h3>
    <p style="text-align: center">To provide comprehensive, patient-centered healthcare solutions that ensure the seamless management of mental and physical well-being, enabling medical and non-medical staff to deliver efficient, compassionate, and quality care to all.</p>
    
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 ABC Hospital - Matara. All rights reserved.</p>
    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</footer>
