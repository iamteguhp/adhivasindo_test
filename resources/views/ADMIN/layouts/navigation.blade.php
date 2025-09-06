<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ url('/admin/homepage') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <br>

                <li class="menu-title" key="t-apps">Users</li>
                    <li>
                        <a href="{{ url('/admin/user') }}" class="waves-effect">
                            <i class="bx bx-user-pin"></i>
                            <span key="t-dashboards">User</span>
                        </a>
                    </li>
                    
                <br>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>