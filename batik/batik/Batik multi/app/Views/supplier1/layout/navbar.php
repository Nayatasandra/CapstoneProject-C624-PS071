<?php
$session = session();
?>
<nav class="navbar sticky-top navbar-dark bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="img/_dicoding.png" alt="" style="max-width: 40px;">ROTI-QU Bakery dan Cake  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title navbar-brand" id="offcanvasDarkNavbarLabel"><img src="img/_dicoding.png" style="max-width: 40px;">  d i c o d i n g </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php if ($session->get('isLoggedIn')) : ?>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('home/index') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('portofolio/index') ?>">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('etalase/index') ?>">Demo Store</a>
                        </li>

                        <?php if (session()->get('role') == 0) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-coffee text-danger"></i>&nbsp Admin Only
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="<?= site_url('barang/index') ?>"><i class="fa-solid fa-plus text-danger"></i>&nbsp Data Product</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('transaksi/index') ?>"><i class="fa-solid fa-money-bill text-danger"></i>&nbsp Data Transaction</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('user/index') ?>"><i class="fa-solid fa-user text-danger"></i>&nbsp Data User</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif ?>
                <div class="nav-item dropdown">
                    <div class="">
                        <hr>
                        <?php if ($session->get('isLoggedIn')) : ?>
                            <a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="fa-solid fa-arrow-left-from-bracket"></i>&nbsp Logout</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?= site_url('login') ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp Login</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</nav>