<!-- Bootstrap Core CSS -->
<!-- <link href="<?php echo e(asset('materialpro/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('materialpro/css/style.css')); ?>" rel="stylesheet"> -->
<!-- You can change the theme colors from here -->
<!-- <link href="<?php echo e(asset('materialpro/css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
<link href="<?php echo e(asset('materialpro/assets/plugins/footable/css/footable.core.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('materialpro/assets/plugins/footable/js/footable.all.min.js')); ?>"></script> -->

<div class="card blog-widget">
    <div class="card-header">
        <h3>Codigos Postales</h3>
    </div>
    <div class="card-body b-t">
    <?php echo BootForm::open(['model' => $codigospostales, 'id'=>'form']);; ?>

        <div class="row">
            <?php echo BootForm::text('codigo_postal', ['html'=>'Código postal:<span class="text text-danger">*</span>'], old('codigo_postal', $strCodigoPostal), ['width' => 'col-md-12']);; ?>

        </div>

        <div class="row">
            <?php echo BootForm::submit('Enviar', ['class' => 'btn btn-primary']);; ?>

        </div>
    <?php echo BootForm::close(); ?>



      <div class="row">
          <div class="col-md-12">
              <h2>Para seleccionar un valor haz clic en el campo código postal</h2>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <table class="table toggle-circle tabla-foo">
                  <thead>
                      <tr>
                          <th>Código postal</th>
                          <th>Localidad</th>
                          <th>Estado</th>
                          <th data-hide="phone">municipio</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $__empty_1 = true; $__currentLoopData = $codigospostales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $codigopostal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <?php echo BootForm::open(['id'=>'form-'.$codigopostal->id]); ?>

                          <?php echo "<tr>"; ?>

                          <?php echo "<td>".
                              BootForm::hidden('codigo_postal', $codigopostal->codigo_postal, ['id'=>'codigo_postal-form-'.$codigopostal->id]).

                              $codigopostal->codigo_postal.
                          "</td>"; ?>

                          <?php echo "<td>".
                              BootForm::hidden('localidad_id', $codigopostal->id, ['id'=>'localidad_id-form-'.$codigopostal->id]).
                              BootForm::hidden('localidad', $codigopostal->localidad, ['id'=>'localidad-form-'.$codigopostal->id]).
                            '<a href="#" data="form-'.$codigopostal->id.'">'.  $codigopostal->localidad.'</a>'.
                          "</td>"; ?>

                          <?php echo "<td>".
                              BootForm::hidden('estado_id', $codigopostal->estado_id, ['id'=>'estado_id-form-'.$codigopostal->id]).
                              BootForm::hidden('estado', $codigopostal->estados->estado, ['id'=>'estado-form-'.$codigopostal->id]).
                              $codigopostal->estados->estado.
                          "</td>"; ?>

                          <?php echo "<td>".
                              BootForm::hidden('municipio_id', $codigopostal->municipio_id, ['id'=>'municipio_id-form-'.$codigopostal->id]).
                              BootForm::hidden('municipio', $codigopostal->nombre_municipio, ['id'=>'municipio-form-'.$codigopostal->id]).
                              $codigopostal->nombre_municipio.
                          "</td>"; ?>

                          <?php echo "</tr>"; ?>

                          <?php echo BootForm::close(); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                              <td colspan="3">Sin resultados</td>
                          </tr>
                      <?php endif; ?>
                  </tbody>
              </table>
          </div>
      </div>

  </div>
</div>

<script >
$( document ).ready(function() {
  $('.tabla-foo').footable();
  $('a').click(function(event) {
      event.preventDefault();
      var idForm = $(this).attr('data');
      var valores = parent.attributeValues;
      for(var i=0; i < valores.length; i++){
          parent.$(valores[i][0]).val($(valores[i][1]+'-'+idForm).val());
      }
      parent.$.fn.colorbox.close();
  });
});
</script>
<!-- Laravel Javascript Validation -->
<!-- <script type="text/javascript" src="<?php echo e(asset('vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<?php echo $validator; ?> -->
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\consultasajax\form.blade.php ENDPATH**/ ?>