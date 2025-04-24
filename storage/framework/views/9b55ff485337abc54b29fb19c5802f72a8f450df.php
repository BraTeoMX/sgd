<div class="card">
    <div class="card-body">
        <div class="row m-t-10 contexto">
          <div class="col-3">
            <div class="flex-row ">
                <h6>Folio: <medium class="label"><?php echo e($rollogistica->folio_Intimark); ?></medium></h6>
            </div>
          </div>
          <div class="col-3">
              <div class="flex-row ">
                  <h6>Material: <medium class="label"><?php echo e($rollogistica->conveniosDetalle->CatMateriales->material); ?></medium></h6>
              </div>
          </div>
          <div class="col-3">
              <div class="flex-row ">
                  <h6>Planta: <medium class="label"><?php echo e($rollogistica->catCliente->nombre_comercial); ?></medium></h6>
              </div>
          </div>
          <div class="col-3">
              <div class="flex-row ">
                  <h6>Destino: <medium class="label"><?php echo e((filled($rollogistica->cliente_destino_id))? $rollogistica->catClienteDestino->nombre_comercial:$rollogistica->catSucursale->sucursal); ?></medium></h6>
              </div>
          </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sgd\resources\views\layouts\partials\contexto.blade.php ENDPATH**/ ?>