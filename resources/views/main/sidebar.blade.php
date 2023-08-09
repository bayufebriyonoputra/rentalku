<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        @if (auth()->user()->is_admin)
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Admin Menu</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/admin-user" aria-expanded="false">
                    <span>
                        <i class="fa-solid fa-user-group"></i>
                    </span>
                    <span class="hide-menu">Users</span>
                </a>
            </li>
        @endif


        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Database Produk</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/kategori" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-layer-group"></i>
                </span>
                <span class="hide-menu">Kategori Produk</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                    <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alerts</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                    <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Card</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                    <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Forms</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                    <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Typography</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AUTH</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                    <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                    <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">EXTRA</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                    <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Icons</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                    <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
            </a>
        </li>
    </ul>
    <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
        <div class="d-flex">
            <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank"
                    class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
            </div>
            <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</nav>
<!-- End Sidebar navigation -->