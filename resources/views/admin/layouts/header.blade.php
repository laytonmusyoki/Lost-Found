<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" aria-label="navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo " href=><img src="{{ asset('person.png') }}" alt="logo" style="width: 60px; height: 60px;"/></a>
        <span style="font-size: 25px;">Lost&Found</span>
        {{-- <a class="navbar-brand brand-logo-mini" href={{ route('home') }}><img src="{{ asset('web/logo.png') }}" alt="logo" style="width: 100%;"/></a> --}}
    </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="menu" data-toggle="minimize">
          <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="{{ asset('web/images/og.png') }}" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                      <i class="ti-settings text-primary"></i>
                      Hello,
                  </a>
                      <a href="{{route('auth.logout')}}" style="text-decoration: none">
                        <button class="dropdown-item">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </button>
                      </a>
              </div>
          </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
      </button>
  </div>
</nav>
