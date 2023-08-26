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
        <li class="sidebar-item">
            <a class="sidebar-link" href="/gaji" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </span>
                <span class="hide-menu">Gaji Karyawan</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Laporan</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/laporan/transaksi-sewa" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-truck-ramp-box"></i>
                </span>
                <span class="hide-menu">Transaksi Sewa</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/laporan/komisi-kirim" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-money-bill-transfer"></i>
                </span>
                <span class="hide-menu">Komisi Kirim</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/laporan/absensi" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-clipboard-list"></i>
                </span>
                <span class="hide-menu">Absensi</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/laporan/jadwal-ambil" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-boxes-stacked"></i>
                </span>
                <span class="hide-menu">Jadwal Ambil</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/laporan/jadwal-kirim" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-cubes-stacked"></i>
                </span>
                <span class="hide-menu">Jadwal Kirim</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Lainnya</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/logout" aria-expanded="false">
                <span>
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </span>
                <span class="hide-menu">Logout</span>
            </a>
        </li>
    </ul>

</nav>
<!-- End Sidebar navigation -->
