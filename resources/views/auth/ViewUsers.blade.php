@include('cdn')

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

    .abc {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 2rem;
        display: flex;
        flex-direction: column; /* Align items vertically */
        align-items: center; /* Center horizontally */
    }

    .section-heading {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem; /* Space between the heading and buttons */
        text-align: center;
        color: #333;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        width: 100%;
        max-width: 800px;
    }

    .btn-custom-1 {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 2.67in; /* Button height */
        padding: 0 1rem; /* Horizontal padding */
        border-radius: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        text-transform: uppercase;
        color: white;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        line-height: 1.2; /* Spacing between text lines */
    }
    

    /* Gradient Colors */
    .btn-custom-1:nth-child(1) {
        background: linear-gradient(135deg, #56ab2f, #a8e063); /* Bright Green */
    }

    .btn-custom-1:nth-child(2) {
        background: linear-gradient(135deg, #f1f2f4, #8059cf); /* Bright Blue */
    }    

    .btn-custom-1:nth-child(3) {
        background: linear-gradient(135deg, #f8ef3a, #e42c2c); /* Magenta */
    }

    .btn-custom-1:nth-child(4) {
        background: linear-gradient(135deg, #4facfe, #00f2fe); /* Coral */
    }

    .btn-custom-1:nth-child(5) {
        background: linear-gradient(135deg, #e70c0c, #c1bbbb); /* Sky Blue */
    }

    .btn-custom-1:nth-child(6) {
        background: linear-gradient(135deg, #43cea2, #185a9d); /* Aqua */
    }

    
    .btn-custom-1:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
    }

    .btn-custom-1:active {
        transform: scale(0.98);
    }
</style>

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
            <p class="mb-0 text-black me-4" style="font-size: 1.0rem;">Mr. {{$admin['name']}}</p>
            <a href="/dashboard" class="btn btn-outline-primary me-2">Dashboard</a>
            <ul class="nav nav-pills">  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle me-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu">                        
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
    </div>    
</nav>
<hr>

<div class="abc">
    <!-- Heading Section -->
    <h1 class="section-heading">User Management</h1>
    <hr>
    
    <!-- Button Section -->
    <div class="button-grid">
        <a href="/addUser" class="btn-custom-1">Add User</a>
        <a href="" class="btn-custom-1">Admin</a>
        <a href="" class="btn-custom-1">Doctors</a>
        <a href="" class="btn-custom-1">Senior Pharmacists</a>
        <a href="" class="btn-custom-1">Junior Pharmacists</a>
        <a href="" class="btn-custom-1">Patients</a>
    </div>
</div>

{{-- <x-Footer/> --}}