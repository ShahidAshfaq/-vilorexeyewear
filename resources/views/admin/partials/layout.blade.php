<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Favicons -->
  <link href="{{asset('admin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{Route('dashboard')}}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">{{ $store->name }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              {{-- Profile Image (Uncomment if needed) --}}
              {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle me-2"> --}}
              <span class="d-none d-md-block dropdown-toggle ps-2">Logout</span>
          </a><!-- End Profile Image Icon -->
      
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile shadow">
              <li class="dropdown-header text-center bg-primary text-white py-2">
                  <h6>Welcome, User!</h6>
                  <p class="mb-0">Manage your profile and settings</p>
              </li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              
              <!-- Log Out Form -->
              <form method="post" action="{{route('logout')}}">
                  <!-- CSRF token -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <li class="d-flex align-items-center justify-content-center">
                      <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                          <i class="bi bi-box-arrow-right me-2"></i> Log Out
                      </a>
                  </li>
              </form>
              
              <li>
                  <hr class="dropdown-divider">
              </li>
      
              <!-- Additional Links (Optional) -->
              <li class="d-flex align-items-center justify-content-center">
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      @if (Route::has('login'))
                          <nav class="d-flex justify-content-between w-100">
                              @auth
                                  <a href="{{ url('/dashboard') }}" class="dropdown-item">
                                      <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                  </a>
                              @else
                                  <a href="{{ route('login') }}" class="dropdown-item">
                                      <i class="bi bi-box-arrow-in-right me-2"></i> Log In
                                  </a>
                                  @if (Route::has('register'))
                                      <a href="{{ route('register') }}" class="dropdown-item">
                                          <i class="bi bi-person-plus-fill me-2"></i> Register
                                      </a>
                                  @endif
                              @endauth
                          </nav>
                      @endif
                  </a>
              </li>
          </ul><!-- End Profile Dropdown Items -->
      </li>
      <!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Profile -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('setting.index') }}">
                <i class="bi bi-person-circle"></i>
                <span>Profile</span>
            </a>
        </li>

        <!-- Products -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="products-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="bi bi-list-ul"></i>
                        <span>All Products</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Product</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Categories -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-tags"></i>
                <span>Categories</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="categories-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('categories.index') }}">
                        <i class="bi bi-list-ul"></i>
                        <span>All Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Blog -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-richtext"></i>
                <span>Blog</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="blog-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('blog.index') }}">
                        <i class="bi bi-list-ul"></i>
                        <span>All Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('blog.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Blog</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        <!-- Coupons -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#coupon-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-ticket-perforated"></i>
                <span>Coupons</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="coupon-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('coupons.index') }}">
                        <i class="bi bi-list-ul"></i>
                        <span>All Coupons</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('coupons.create') }}">
                        <i class="bi bi-plus-circle"></i>
                        <span>Add Coupon</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Orders -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.orders.index') }}">
                <i class="bi bi-bag-check"></i>
                <span>Orders</span>
            </a>
        </li>
         <li class="nav-item">
        <a href="{{ route('admin.messages') }}" class="nav-link">
                <i class="fas fa-envelope"></i>
                <span>Messages</span>
            </a>
            </li>
    </ul>

</aside>
<!-- End Sidebar -->
  <main id="main" class="main">

  @yield('content')

  </main>
  {{-- footer section  --}}

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>{{ $store->name }}</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     Designed by <a href="#">Shahid Developer</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin/assets/js/main.js')}}"></script>

</body>

</html>