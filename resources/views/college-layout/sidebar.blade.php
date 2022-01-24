  <div class="vertical-menu">
      <div class="navbar-brand-box">
          <a href="#" class="logo logo-dark">
              <span class="logo-sm">
                  <!-- <img src="{{asset('front/images/logo-sm.png')}}" alt="" height="40" style="margin-top:20px; margin-left:-10px;"> -->
              </span>
              <span class="logo-lg">
                  <!-- <img src="{{asset('front/images/logo.png')}}" alt="" height="40" style="margin-top: 15px; margin-left:20px;"> -->
              </span>
          </a>

          <a href="#" class="logo logo-light">
              <span class="logo-sm">
                  <!-- <img src="{{asset('front/images/logo-sm.png')}}" alt="" height="40" style="margin-top:20px; margin-left:-10px;"> -->
              </span>
              <span class="logo-lg">
                  <!-- <img src="{{asset('front/images/logo.png')}}" alt="" height="40" style="margin-top: 15px; margin-left:20px;"> -->
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
                  <li class="menu-title">Menu</li>
                  <li>
                      <a href="{{ route('college.dashboard.index') }}">
                          <i class="fas fa-tachometer-alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('college.collegecourse') }}">
                          <i class="fas fa-book-reader"></i>
                          <span>Course</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ route('college.collegemerit') }}">
                          <i class="fas fa-marker"></i>
                          <span>Merit</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('college.studentindex') }}">
                          <i class="fas fa-users"></i>
                          <span>Student</span>
                      </a>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="fas fa-box-tissue"></i>
                          <span>Addmission</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('college.confirmaddmissionindex')}}">Addmission Confirm</a></li>
                      </ul>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('college.rejectedaddmissionindex')}}">Addmission Rejected/Pendding</a></li>
                      </ul>
                  </li>

              </ul>
          </div>
      </div>
  </div>