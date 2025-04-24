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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                           <h2><b>Sistema SGD </b><br><b>Control de Acceso</b></h2>
                        </div>
                    </div>
                </div>
                <?php echo BootForm::open(['route'=>'login','id'=>'loginform','class'=>'form-horizontal']); ?>

                <!--   <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::text('email', 'Usuario:'); ?>

                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::text('usuario', 'Número de Empleado:'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::password('password', 'Contraseña:',['autocomplete'=>'off']); ?>

                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::submit('Entrar',  ['class' => 'text-center btn btn-primary waves-light form-group m-t-3']); ?>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="<?php echo e(route('password.request')); ?>" id="to-recover" class="btn-link text-primary pull-right"><i class="fa fa-lock m-r-5"></i>
                                    <?php echo e(__('¿Olvidaste tu contraseña?')); ?>

                                </a>
                            </div>
                        </div>    
                    </div> 
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <a  href="<?php echo route('usuarioregistro'); ?> "id="to-recover" class="btn-link text-primary pull-right"><i class="fa fa-lock m-r-5"></i>
                               
                                    <?php echo e(__('¿Registrate')); ?>

                                </a>
                                
                            </div>
                        </div>
                    </div>
                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts/partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/auth/login.blade.php ENDPATH**/ ?>