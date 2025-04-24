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
                           <h2><?php echo e(__('Reset Password')); ?></h2>
                        </div>
                    </div>
                </div>
                <?php echo BootForm::open(['route'=>'usuario.passwordupdate','id'=>'form','class'=>'form-horizontal']); ?>

                    <?php echo BootForm::hidden("_setpassword", "1", ["class"=>"form-control"]);; ?>

                     <!--<div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::text('email', __('E-Mail Address'), old('email'), ['autocomplete'=>'off']); ?>

                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::text('usuario', 'Número de Empleado:'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::password('password', __('Password'), ['autocomplete'=>'off']); ?>

                            <?php echo Form::label('labelPassword','En la contraseña NO incluir caracteres especiales, solo letras y números',['style'=> 'color:red' ],false); ?>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::password('password_confirmation', __('Confirm Password'), ['autocomplete'=>'off']); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo BootForm::submit(__('Reset Password'),  ['class' => 'text-center btn btn-primary waves-light form-group m-t-3']); ?>

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
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\auth\passwords\reset.blade.php ENDPATH**/ ?>