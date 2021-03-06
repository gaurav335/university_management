  <div class="vertical-menu">

      <!-- LOGO -->
      <div class="navbar-brand-box">
          <a href="#" class="logo logo-dark">
              <span class="logo-sm">
                  <img src="{{ asset('admins/images/logo-sm.jpg') }}" alt="" height="40"
                      style="margin-top:15px; margin-left:-8px;">
              </span>
              <span class="logo-lg">
                  <img src="{{ asset('admins/images/logo.jpg') }}" alt="" height="50"
                      style="margin-top: 20px; margin-left:20px;">
              </span>
          </a>

          <a href="#" class="logo logo-light">
              <span class="logo-sm">
                  <img src="{{ asset('admins/images/logo-sm.jpg') }}" alt="" height="40"
                      style="margin-top:15px; margin-left:-8px;">
              </span>
              <span class="logo-lg">
                  <img src="{{ asset('admins/images/logo.jpg') }}" alt="" height="50"
                      style="margin-top: 20px; margin-left:20px;">
              </span>
          </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
          <i class="fa fa-fw fa-bars"></i>
      </button>

      <div data-simplebar class="sidebar-menu-scroll">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <!-- <li class="menu-title">Menu</li> -->

                  <li>
                      <a href="{{ route('admin.dashboard.index') }}">
                          <i class="fas fa-tachometer-alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('admin.college')}}">
                          <i class="fas fa-university"></i>
                          <span>College</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('admin.course')}}">
                          <i class="fas fa-book-reader"></i>
                          <span>Course</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('admin.adminsubjectindex')}}">
                          <i class="fas fa-book"></i>
                          <span>Subject</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('admin.student')}}">
                          <i class="fas fa-users"></i>
                          <span>Student</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('admin.addmission')}}">
                          <i class="fas fa-box-tissue"></i>
                          <span>Addmission</span>
                      </a>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="fas fa-users-cog"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('admin.subject')}}">Subject Merit</a></li>
                      </ul>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('admin.meritround')}}">Merit Round</a></li>
                      </ul>
                  </li>



              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>