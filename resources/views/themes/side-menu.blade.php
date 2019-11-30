<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview @yield('menu-open-customer') ">
            <a href="#" class="nav-link @yield('customer-menu')">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                    Customer
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/customer/register" class="nav-link @yield('customer-register')">
                        <i class="far fa-circle nav-icon @yield('customer-register-color')"></i>
                        <p>Register</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/customer" class="nav-link @yield('customer-list')">
                        <i class="far fa-circle nav-icon @yield('customer-list-color')"></i>
                        <p>List</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview @yield('menu-open-place')">
            <a href="/place/register" class="nav-link @yield('place-menu')">
                <i class="fas fa-globe-asia"></i>
                <p>
                    Register Place
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/place" class="nav-link @yield('place-list')">
                        <i class="far fa-circle nav-icon @yield('place-list-color')"></i>
                        <p>Place List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/place/register" class="nav-link @yield('place-register')">
                        <i class="far fa-circle nav-icon @yield('place-register-color')"></i>
                        <p>Register New</p>
                    </a>
                </li>



            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
