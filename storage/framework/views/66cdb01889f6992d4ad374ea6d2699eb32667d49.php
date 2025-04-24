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
                           <h2>Establecer contraseña</h2>
                        </div>
                    </div>
                </div>
                <?php echo BootForm::open(['model' => $usuario, 'update' => 'usuario.updatepassword', 'id'=>'form']); ?>

                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_setpassword" value="1">

                <div class="row">
                    <div class="col-md-12">
                        <label for="nombre">Nombre:</label><br><span><?php echo e($usuario->name); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="email">Correo electrónico:</label><br><span><?php echo e($usuario->email); ?></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php echo BootForm::password("password", "Contraseña:", ["width" => "col-md-12"]);; ?>

                    <?php echo Form::label('labelPassword','En la contraseña NO incluir caracteres especiales, solo letras y números',['style'=> 'color:red' ],false); ?> 
                </div>
                <div class="row">
                    <?php echo BootForm::password("password_confirmation", "Confirmar contraseña:", ["width" => "col-md-12"]);; ?>

                </div>

                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" name="enviar" value="usuario" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
                <?php echo BootForm::close(); ?>

            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts/partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/usuarios/setpassword.blade.php ENDPATH**/ ?>