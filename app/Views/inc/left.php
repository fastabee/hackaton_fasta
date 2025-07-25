<aside class="left-sidebar with-vertical">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo base_url('public/template/') ?>dark/index.html" class="text-nowrap logo-img">
            <img src="<?php echo base_url('public/template/') ?>assets/images/logos/logo-light.svg" class="dark-logo" alt="Logo-Dark" />
            <img src="<?php echo base_url('public/template/') ?>assets/images/logos/logo-dark.svg" class="light-logo" alt="Logo-light" />
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
        </a>
    </div>

    <div class="scroll-sidebar" data-simplebar>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="mb-0">

                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="<?php echo base_url('/') ?> " aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Data Master</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="<?php echo base_url('datamaster/halte') ?>" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Halte</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Tracking</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="<?php echo base_url('tracking/rute') ?>" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Cek Rute</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Kompress</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="<?php echo base_url('kompress/images') ?>" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Kompress Images</span>
                    </a>
                </li>


                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Riwayat Kompress</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="<?php echo base_url('riwayat_kompress') ?>" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1"> Riwayat Kompress Images</span>
                    </a>
                </li>

        </nav>
        <!-- End Sidebar navigation -->
    </div>

    <div class=" fixed-profile mx-3 mt-3">
        <div class="card bg-primary-subtle mb-0 shadow-none">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="<?php echo base_url('public/template/') ?>assets/images/profile/user-1.jpg" width="45" height="45" class="img-fluid rounded-circle" alt="" />
                        <div>
                            <h5 class="mb-1"><?php echo session('nama') ?></h5>
                            <p class="mb-0">Admin</p>
                        </div>
                    </div>
                    <a href="<?php echo base_url('logout') ?>" class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Logout">
                        <iconify-icon icon="solar:logout-line-duotone" class="fs-8"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
</aside>