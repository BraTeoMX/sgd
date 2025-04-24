<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $__env->make('layouts/partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link rel="stylesheet" href="<?php echo asset('/css/Intimark.app.css'); ?>">
    </head>
  <body class="">
    <div class="container-scroller login-register login-sidebar" style="background-image:url(<?php echo asset('img/Intimarklogin.jpg'); ?>);">
        <div class="login-box card">
            <div class="card-body mt-4">
                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                           <h2><?php echo e(__('Reset Password')); ?></h2>
                        </div>
                    </div>
                </div>
                <?php echo BootForm::open(['route'=>'password.email','id'=>'form','class'=>'form-horizontal']); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::text('email', 'Correo electrónico:'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::submit(__('Send Password Reset Link'),  ['class' => 'text-center btn btn-primary waves-light form-group m-t-3']); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                             <a href="<?php echo e(route('login')); ?>" id="to-recover" class="btn-link text-primary pull-right"><i class="fa fa-user m-r-5"></i>
                                 Acceder
                              </a>
                         </div>
                    </div>

                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts/partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>