<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'ShopNepal')</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f8f9fa;
      line-height: 1.6;
    }
    /* Navbar */
    .navbar {
      padding: 1rem 2rem;
      transition: background-color 0.3s, box-shadow 0.3s;
      background-color:red;
      
    }
    .navbar.scrolled {
      background: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .nav-link {
      margin: 0 0.5rem;
      font-weight: 500;
    }

    /* Cards (for product cards, etc.) */
    .product-card {
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      background: #ffffff;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    .product-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    /* Footer */
    footer {
      background: #111827;
      color: #d1d5db;
      padding: 40px 0;
      margin-top: 50px;
    }
    footer a {
      color: #d1d5db;
      text-decoration: none;
      transition: color 0.3s;
    }
    footer a:hover {
      color: #ffffff;
    }
    .footer-links {
      list-style: none;
      padding: 0;
    }
    .footer-links li {
      margin-bottom: 8px;
    }

    /* Utility / Misc */
    .container-content {
      padding-top: 2rem;
      padding-bottom: 2rem;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">ShopNepal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="{{ route('cart') }}">
              <i class="bi bi-cart3 me-1"></i> Cart
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content wrapper -->
  <div class="container container-content">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer>
    <div class="container text-center text-lg-start">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5>ShopNepal</h5>
          <p>Your trusted Nepal‑based online shop. Quality products, fast delivery.</p>
        </div>
        <div class="col-lg-4 mb-4">
          <h5>Quick Links</h5>
          <ul class="footer-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-lg-4 mb-4">
          <h5>Follow Us</h5>
          <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
          <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
          <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
        </div>
      </div>
      <div class="text-center pt-3">
        &copy; {{ date('Y') }} ShopNepal. All rights reserved.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Add shadow to navbar on scroll
    window.addEventListener('scroll', function() {
      const nav = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
    });
  </script>
</body>
</html>
