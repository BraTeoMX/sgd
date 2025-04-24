<?php $__env->startSection('styleBFile'); ?>
    <!-- Color Box -->
    <link href="<?php echo e(asset('colorbox/colorbox.css')); ?>" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Incapacidad</h3>
        </div>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <?php if(isset($incapacidad)): ?>
                <?php $__empty_1 = true; $__currentLoopData = $incapacidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faltaj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo Form::open(['route' => 'editarincapacidad', 'method' => 'post', 'files' => true]); ?>

                    <div class="row">
                        <div class="col-md-2">
                            <?php echo BootForm::hidden('id', $faltaj->id); ?>

                            <?php echo BootForm::text('folio', 'Folio ', $faltaj->folio_incapacidad, ['width' => 'col-md-3', 'readonly']); ?>

                        </div>
                        <div class="col-md-2">
                            <?php echo BootForm::text('no_emp', 'No. EMPLEADO ', $faltaj->fk_empleado, ['width' => 'col-md-3', 'readonly']); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::text('nom_emp', 'NOMBRE ', $faltaj->Nom_Emp . ' ' . $faltaj->Ap_Pat . ' ' . $faltaj->Ap_Mat, [
                                'width' => 'col-md-3',
                                'readonly',
                            ]); ?>

                        </div>
                        <div class="col-md-3">
                            <?php echo BootForm::text('departamento', 'Departamento ', $faltaj->Departamento, ['width' => 'col-md-3', 'readonly']); ?>

                        </div>
                        <?php if(auth()->user()->hasRole('Administrador Sistema')): ?>
                            <div class="col-md-2">
                                <?php echo BootForm::select('oficioentregado', 'Oficio entregado', ['SELECCIONE', 'SI' => 'SI', 'NO' => 'NO']); ?>

                            </div>
                        <?php endif; ?>
                        <br>
                    </div>
                    <?php if(auth()->user()->hasRole('Servicio Medico')): ?>
                        <div class="row">
                            <div class="col-md-7">

                                <?php echo BootForm::file('fileincapacidad', 'Fortmato incapacidad. ' . $faltaj->formato_incapacidad, [
                                    'class' => 'form-control-file',
                                    'accept' => 'application/pdf',
                                ]); ?>

                                <br>
                                <?php echo BootForm::file('filest9', 'Probable enfermedad de trabajo | ST-9. ' . $faltaj->formato_st9, [
                                    'class' => 'form-control-file',
                                    'accept' => 'application/pdf',
                                ]); ?>

                                <br>
                                <?php echo BootForm::file('filest7', 'Probable accidente de trabajo | ST-7. ' . $faltaj->formato_st7, [
                                    'class' => 'form-control-file',
                                    'accept' => 'application/pdf',
                                ]); ?>

                                <br>
                                <?php echo BootForm::file('filest3', 'Incapacidad permanente o defuncion | ST-3. ' . $faltaj->formato_st3, [
                                    'class' => 'form-control-file',
                                    'accept' => 'application/pdf',
                                ]); ?>

                                <br>
                                <?php echo BootForm::file('filealta', 'Dictamen de alta por riesgo de trabajo | ST-2. ' . $faltaj->formato_alta, [
                                    'class' => 'form-control-file',
                                    'accept' => 'application/pdf',
                                ]); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <div class="row" id='id_enviar'>
                        <div class="col center">
                            <button type="submit" name="solicitar" id='solicitar' value="Solicitar permisos"
                                class="btn btn-primary">Actualizar</button>
                            <a href="<?php echo route('home'); ?>" class="btn btn-light">Cancelar</a>

                        </div>
                    </div>
                    <br>

                    <?php echo Form::close(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptBFile'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/incapacidades/actualizar.blade.php ENDPATH**/ ?>