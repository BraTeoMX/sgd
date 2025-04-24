<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" >

        <a class="navbar-brand brand-logo" href="<?php echo route('home'); ?>">

            <img src="<?php echo asset('/img/logo.png'); ?>" alt="logo" height="70px" />

        </a>

        <a class="navbar-brand brand-logo-mini" href="<?php echo route('home'); ?>">

            <img src="<?php echo asset('/img/logo-mini.svg'); ?>" alt="logo" />

        </a>

    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center" >

        <ul class="navbar-nav ml-auto" >

            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown" >

             

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                    <div class="dropdown-header text-center">

                        <img class="img-md rounded-circle" src="<?php echo asset('/img/face8.jpg'); ?>" alt="Profile image">

                        <p class="mb-1 mt-3 font-weight-semibold"><?php echo e(Auth::user()->name); ?></p>

                        <p class="font-weight-light text-muted mb-0"><?php echo e(Auth::user()->email); ?></p>

                    </div>

                    <a href="<?php echo route('logout'); ?>" class="dropdown-item">

                        <i class="fa fa-power-off"></i>&nbsp;Salir

                    </a>

                </div>

            </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

            <span class="fa fa-list"></span>

        </button>

    </div>

</nav>

<?php /**PATH C:\xampp\htdocs\sgd\resources\views\layouts\partials\navbar.blade.php ENDPATH**/ ?>