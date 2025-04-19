<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-img {
            height: 20px;
            margin-right: 8px;
        }
        .category-card {
            transition: 0.3s;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{asset('/storage/application-image/logo-1.png')}}" alt="" width="50px" style="border-radius: 20px;margin:0 20px 0 0">
            My Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><img src="https://img.icons8.com/color/48/code.png" width="20"> Web Dev</a></li>
                        <li><a class="dropdown-item" href="#"><img src="https://img.icons8.com/color/48/design.png" width="20"> Design</a></li>
                        <li><a class="dropdown-item" href="#"><img src="https://img.icons8.com/color/48/data.png" width="20"> Data Science</a></li>
                    </ul>
                </li>
            </ul>

            <div class="d-flex">
                @auth
                    <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="bg-light py-5 text-center">
    <div class="container">
        <h1 class="display-4">Welcome to My Blog</h1>
        <p class="lead">Explore tutorials, insights, and resources from developers and creators like you.</p>
    </div>
</div>

<!-- Featured Posts -->
<div class="container my-5">
    <h2 class="mb-4">Featured Posts</h2>
    <div class="row g-4">
        @for ($i = 1; $i <= 6; $i++)
        <div class="col-md-4">
            <div class="card h-100 shadow">
                <img src="{{asset('storage\application-image\blog-'.$i.'.jpg')}}" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Featured Blog Title {{ $i }}</h5>
                    <p class="card-text">Quick preview of the content goes here for post {{ $i }}. Encourages clicks.</p>
                    <a href="#" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- Categories Section -->
<div class="container my-5">
    <h2 class="mb-4">Popular Categories</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card category-card p-3 text-center bg-info bg-opacity-10">
                <img src="https://img.icons8.com/fluency/48/html-5.png" width="50">
                <h5 class="mt-3">Frontend Development</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card category-card p-3 text-center bg-warning bg-opacity-10">
                <img src="https://img.icons8.com/fluency/48/database.png" width="50">
                <h5 class="mt-3">Backend & Databases</h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card category-card p-3 text-center bg-success bg-opacity-10">
                <img src="https://img.icons8.com/fluency/48/api.png" width="50">
                <h5 class="mt-3">APIs & Integrations</h5>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-dark text-white py-5 text-center">
    <div class="container">
        <h2>Want to share your own story?</h2>
        <p class="mb-4">Join the community of developers and share your thoughts with the world.</p>
        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Get Started</a>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
        &copy; {{ date('Y') }} My Blog. All rights reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
