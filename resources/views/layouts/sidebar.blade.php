<!-- <div class="sidebar" id="sidebar">

    <div class="sidebar-header">

        <div class="sidebar-title">
            MAIN MENU
        </div>

        <div class="close-btn" id="closeSidebar">

            <i class="fa-solid fa-xmark"></i>

        </div>

    </div>

    <ul class="sidebar-menu">

        <li>

            <a href="{{ url('/dashboard') }}">

                <i class="fa-solid fa-chart-line"></i>

                <span>
                    Dashboard
                </span>

            </a>

        </li>


        <li class="submenu">

            <div class="submenu-toggle">

                <div class="submenu-left">

                    <i class="fa-solid fa-gear"></i>

                    <span>
                        Settings
                    </span>

                </div>

                <i class="fa-solid fa-angle-down arrow"></i>

            </div>

            <ul class="submenu-list">

                <li>
                    <a href="#">
                        User Creation
                    </a>
                </li>

                <li>
                    <a href="#">
                        User Type
                    </a>
                </li>

                <li>
                    <a href="#">
                        User Screen
                    </a>
                </li>

                <li>
                    <a href="#">
                        User Permission
                    </a>
                </li>

            </ul>

        </li>


        {{-- MODULES --}}
        <li class="submenu">

            <div class="submenu-toggle">

                <div class="submenu-left">

                    <i class="fa-solid fa-cube"></i>

                    <span>
                        Modules
                    </span>

                </div>

                <i class="fa-solid fa-angle-down arrow"></i>

            </div>

            <ul class="submenu-list">

                <li>
                    <a href="{{ url('/quotation') }}">
                        Quotation
                    </a>
                </li>

                <li>
                    <a href="#">
                        Billing
                    </a>
                </li>

                <li>
                    <a href="#">
                        Stock
                    </a>
                </li>

            </ul>

        </li>

    </ul>

</div> -->\


<div class="sidebar" id="sidebar">

    <!-- LOGO -->
    <div class="sidebar-logo">

        <div class="logo-gem">
            <i class="fa-solid fa-gem"></i>
        </div>

        <div class="logo-words">

            <div class="logo-main">
                OHM MURUGA
            </div>

            <div class="logo-sub">
                TILES
            </div>

        </div>

    </div>

    <!-- MENU -->
    <div class="nav-section">
        MAIN
    </div>

    <a href="{{ url('/dashboard') }}"
       class="nav-item active">

        <i class="fa-solid fa-chart-pie"></i>

        Dashboard

    </a>

    <div class="nav-section">
        INVENTORY
    </div>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-file-lines"></i>

        Quotations

        <span class="nav-badge">
            12
        </span>

    </a>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-receipt"></i>

        Invoices

    </a>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-boxes-stacked"></i>

        Stock Management

    </a>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-truck"></i>

        Orders

        <span class="nav-badge red">
            4
        </span>

    </a>

    <div class="nav-section">
        CRM
    </div>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-users"></i>

        Customers

    </a>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-chart-line"></i>

        Reports

    </a>

    <div class="nav-section">
        SYSTEM
    </div>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-gear"></i>

        Settings

    </a>

    <a href="#"
       class="nav-item">

        <i class="fa-solid fa-shield-halved"></i>

        User Roles

    </a>

    <!-- FOOTER -->
    <div class="sidebar-footer">

        <a href="#"
           class="sidebar-footer-link">

            <i class="fa-solid fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</div>

<!-- OVERLAY -->
<div class="overlay"
     id="overlay"
     onclick="closeSidebar()">
</div>