<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="assets/material/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">          
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'text-white active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
          </a>        
        </li>      
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Data Master</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('home') ? 'text-white active bg-gradient-primary' : '' }}" href="{{ route('home') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Home</span>
          </a>        
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('about') ? 'text-white active bg-gradient-primary' : '' }}" href="{{ route('about') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">About</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('product') ? 'text-white active bg-gradient-primary' : '' }}" href="{{ route('product') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('testimonial') ? 'text-white active bg-gradient-primary' : '' }}" href="{{ route('testimonial') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Testimonial</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contact') ? 'text-white active bg-gradient-primary' : '' }}" href="{{ route('contact') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">call</i>
            </div>
            <span class="nav-link-text ms-1">Contact</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Options</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('actionLogout') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>