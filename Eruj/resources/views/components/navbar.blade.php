<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mx-3">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0  fs-4 fw-bold"  href="/">
          {{-- <img
            src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
            height="15"
            alt=""
            loading="lazy"
          /> --}}
         
          <span title="Garbage Management System" class="text-success ms-5">Solid Waste Management System <span> 
        </a>
        <!-- Left links -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dustbins">Dustbins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/collections">Collection</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      {{-- <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>
  
        <!-- Notifications -->
        <a
          class="text-reset me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul> --}}
  
        <!-- Avatar -->
        
        @if (session('user'))
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow ms-2"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          {{-- <img
            src="https://mdbootstrap.com/img/new/avatars/2.jpg"
            class="rounded-circle"
            height="25"
            alt=""
            loading="lazy"
          /> --}}
          <span class="bg-success " style="border-radius: 100px;padding:8px 13px;"><i class="far fa-user text-white"></i></span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
            <a class="dropdown-item" href="/logout">Logout</a>
          </li>
        </ul>
        
            
      @endif
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->