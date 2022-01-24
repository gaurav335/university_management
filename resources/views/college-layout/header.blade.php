
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- <a href="#">
                <img src="{{ Auth::user()->avatar }}" class="navbar-logo" alt="logo" width="50px" height="50px">
            </a> -->
            <!-- <b><a href="#" class="nav-link" style="margin-top:6px;">{{ Auth::user()->name }}</a></b> -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <!-- <img src="{{ asset('front/images/logo-sm.png') }}" alt="" height="40"
                            style="margin-top:20px; margin-left:-10px;"> -->
                    </span>
                    <span class="logo-lg">
                        <!-- <img src="{{ asset('front/images/logo.png') }}" alt="" height="40"
                            style="margin-top: 15px; margin-left:20px;"> -->
                    </span>
                </a>
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <!-- <img src="{{ asset('front/images/logo-sm.png') }}" alt="" height="40"
                            style="margin-top:20px; margin-left:-10px;"> -->
                    </span>
                    <span class="logo-lg">
                        <!-- <img src="{{ asset('front/images/logo.png') }}" alt="" height="40"
                            style="margin-top: 15px; margin-left:20px;"> -->
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- App Search-->

        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ Auth::user()->logo }}"
                        alt="Header Avatar">
                    <span
                        class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{ Auth::user()->name }}</span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('college.profile') }}"><i
                            class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span
                            class="align-middle">Profile Change</span></a>
                            <a class="dropdown-item" href="{{ route('college.changepassword') }}"><i
                            class="uil uil-lock-alt font-size-18 align-middle text-muted mr-1"></i> <span
                            class="align-middle">Change Password</span></a>
                    <a class="dropdown-item" href="{{ route('college.logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form-collage').submit();"><i
                            class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span
                            class="align-middle">Sign out</span></a>
                    <form id="logout-form-collage" action="{{ route('college.logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </div>
            </div>



        </div>
    </div>
    <div id="notificationModel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notification</h5>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
</header>
@push('college-script')

@endpush
