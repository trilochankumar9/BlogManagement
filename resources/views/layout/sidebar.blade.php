<header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #343a40; color: #fff; padding: 10px 20px;">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center" style="text-decoration: none; color: #fff;">
            {{-- <img src="admin/assets/img/logo.png" alt="" style="width: 40px; height: 40px; margin-right: 10px;"> --}}
            <span class="d-none d-lg-block" style="font-size: 1.5rem; font-weight: bold;">Blog Management</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn" style="font-size: 1.5rem; color: #fff; cursor: pointer;"></i>
    </div><!-- End Logo -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" style="background-color: #212529; color: #fff;">

    <ul class="sidebar-nav" id="sidebar-nav" style="list-style: none; padding: 0; margin: 0;">

        <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link" href="{{ Auth::user()->user_type == 'admin' ? route('/admin/dashboard') : route('/user/dashboard') }}" style="text-decoration: none; color: #adb5bd; display: flex; align-items: center; padding: 10px 15px; border-radius: 5px;">
                <i class="bi bi-house-door" style="font-size: 1.2rem; margin-right: 10px; color: #0d6efd;"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->user_type == "admin")
        <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link" href="{{ route('/admin/user-list') }}" style="text-decoration: none; color: #adb5bd; display: flex; align-items: center; padding: 10px 15px; border-radius: 5px;">
                <i class="bi bi-people" style="font-size: 1.2rem; margin-right: 10px; color: #0d6efd;"></i>
                <span>Users</span>
            </a>
        </li>
        @endif

        <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link" href="{{ Auth::user()->user_type == 'admin' ? route('/admin/post') : route('/user/post') }}" style="text-decoration: none; color: #adb5bd; display: flex; align-items: center; padding: 10px 15px; border-radius: 5px;">
                <i class="bi bi-pencil-square" style="font-size: 1.2rem; margin-right: 10px; color: #0d6efd;"></i>
                <span>Posts</span>
            </a>
        </li>

        <li class="nav-item" style="margin-bottom: 10px;">
            <a class="nav-link" href="{{ route('/logout') }}" style="text-decoration: none; color: #adb5bd; display: flex; align-items: center; padding: 10px 15px; border-radius: 5px;">
                <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; margin-right: 10px; color: #0d6efd;"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar -->
