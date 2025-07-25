<?php if (!session('id')) : ?>
    <script>
        window.location.href = "<?= base_url('login') ?>";
    </script>
    <?php exit; ?>
<?php endif; ?>


<header class="topbar sticky-top">
    <div class="with-vertical"><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Header -->
        <!-- ---------------------------------- -->
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <div class="nav-icon-hover-bg rounded-circle ">
                            <iconify-icon icon="solar:list-bold-duotone" class="fs-7 text-dark"></iconify-icon>
                        </div>
                    </a>
                </li>
            </ul>






            <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                        aria-controls="offcanvasWithBothOptions">
                        <div class="nav-icon-hover-bg rounded-circle ">
                            <i class="ti ti-align-justified fs-7"></i>
                        </div>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                        <!-- ------------------------------- -->
                        <!-- start language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end language Dropdown -->
                        <!-- ------------------------------- -->

                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover moon dark-layout" href="javascript:void(0)">
                                <iconify-icon icon="solar:moon-line-duotone" class="moon fs-7"></iconify-icon>
                            </a>
                            <a class="nav-link nav-icon-hover sun light-layout" href="javascript:void(0)">
                                <iconify-icon icon="solar:sun-2-line-duotone" class="sun fs-7"></iconify-icon>
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <div class="user-profile me-sm-3 me-2">
                                        <img src="<?php echo base_url('public/template/') ?>assets/images/profile/user-1.jpg" width="45" class="rounded-circle" alt="">
                                    </div>
                                    <span class="d-sm-none d-block"><iconify-icon
                                            icon="solar:alt-arrow-down-line-duotone"></iconify-icon></span>

                                    <div class="d-none d-sm-block">
                                        <h6 class="fw-bold fs-4 mb-1 profile-name">
                                            <?php echo session('nama') ?>
                                        </h6>
                                        <p class="fs-3 lh-base mb-0 profile-subtext">
                                            Admin
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="d-flex align-items-center justify-content-between pt-3 px-7">
                                        <h3 class="mb-0 fs-5">User Profile</h3>
                                        <button type="button" class="border-0 bg-transparent" aria-label="Close">
                                            <iconify-icon icon="solar:close-circle-line-duotone" class="fs-7 text-muted"></iconify-icon>
                                        </button>
                                    </div>

                                    <div class="d-flex align-items-center mx-7 py-9 border-bottom">
                                        <img src="<?php echo base_url('public/template/') ?>assets/images/profile/user-1.jpg" alt="user" width="90" class="rounded-circle" />
                                        <div class="ms-4">
                                            <h4 class="mb-0 fs-5 fw-normal"><?php echo session('nama') ?></h4>
                                            <span class="text-muted"><?php echo session('username') ?></span>
                                            <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                                                <iconify-icon icon="solar:mailbox-line-duotone" class="fs-4 me-1"></iconify-icon>
                                                <?php echo session('email') ?>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- <div class="message-body">
                                        <a href="<?php echo base_url('public/template/') ?>dark/page-user-profile.html" class="dropdown-item px-7 d-flex align-items-center py-6">
                                            <span class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                                <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7"></iconify-icon>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                    My Profile
                                                </h5>
                                                <span class="fs-3 text-nowrap d-block fw-normal mt-1 text-muted">Account Settings</span>
                                            </div>
                                        </a>


                                    </div> -->

                                    <div class="py-6 px-7 mb-1">
                                        <a href="<?php echo base_url('logout') ?>" class="btn btn-primary w-100">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Header -->
        <!-- ---------------------------------- -->

        <!-- ------------------------------- -->
        <!-- apps Dropdown in Small screen -->
        <!-- ------------------------------- -->
        <!--  Mobilenavbar -->

    </div>

</header>