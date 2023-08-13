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
            <a class="sidebar-link" href="/merk" aria-expanded="false">
                <span>
                    <i class="fa-brands fa-bandcamp"></i>
                </span>
                <span class="hide-menu">Merk</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/tipe" aria-expanded="false">
                <span>
                    <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Tipe</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Database</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/karyawan" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-person"></i>
                </span>
                <span class="hide-menu">Karyawan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/pelanggan" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-people-group"></i>
                </span>
                <span class="hide-menu">Pelanggan</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Transaksi</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/transaksi-sewa" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-retweet"></i>
                </span>
                <span class="hide-menu">Penyewaan Barang</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/pengiriman" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-truck"></i>
                </span>
                <span class="hide-menu">Pengiriman Barang</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/absensi" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-chart-simple"></i>
                </span>
                <span class="hide-menu">Absensi Karyawan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/pinjaman" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-coins"></i>
                </span>
                <span class="hide-menu">Pinjaman Karyawan</span>
            </a>
        </li>
    </ul>

</nav>
<!-- End Sidebar navigation -->
