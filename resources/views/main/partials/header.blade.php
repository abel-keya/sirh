<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">HRIS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kelvin</b>HRIS</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <span class="hidden-xs">
                {{ Auth::user()->name }} 
                <i class="fa fa-caret-down"></i>
              </span>
            </a>
            <ul class="dropdown-menu">  
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('my-account/view') }}" class="btn btn-default btn-flat">My Account</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> 
        </ul>
      </div>

    </nav>
  </header>