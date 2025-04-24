<!DOCTYPE html>
<html>
<head>
    <title>Ticket recoleccion</title>
    <style>
@page  {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 0cm 0.5cm 0.5cm;
        }
</style>
</head>
<body>
<div>
    <div style="float:left;width: 30%;"><img src="http://inventarioIntimark.com/img/logo_ticket2021.png" width="100px" heigth="82px" ></div>
    <div style="float:left;width: 70%;"> <h6 style="text-align:right">Recuperadora de <br>Materiales
    Ocampo<br> de Toluca SA de CV</h6></td>
</div>    
    <h3 style="text-align:center">Sucursal <?php echo e($rollogistica->sucursalCliente->sucursal); ?></h3>
    <h3 style="text-align:center">Cliente <?php echo e($rollogistica->convenio->catCliente->nombre_comercial); ?></h3>
    <p>Sitio: <strong><?php echo e(optional($rollogistica->sitiosAll)->sitio); ?></strong> </p>
    <p>Chofer: <strong><?php echo e(optional($rollogistica->catChofer)->nombre); ?></strong> </p>
    <p>Unidad: <strong><?php echo e(optional($rollogistica->vehiculo)->tipo_unidad); ?></strong> </p>
    <p>Placas: <strong><?php echo e(optional($rollogistica->vehiculo)->placas); ?></strong></p>
    <p>Recoleccion finalizada: <strong><?php echo e($rollogistica->recolecion_terminada); ?></strong></p>
    </br>
    <p> 
        Folio Intimark: <strong><?php echo e($rollogistica->convenio->catCliente->serie); ?> - <?php echo e($rollogistica->id); ?></strong>
     </p>
    </br>
    </br>
    <p> Folio planta: <strong><?php echo e(optional($horarios)->folio_planta); ?></strong> </p>
    </br>
    <p>Fecha: <strong><?php echo e($rollogistica->fecha->format('d-m-Y')); ?></strong></p>
    <div id="customers">
        <table style="width:100%">
            <colgroup>
                <col width="15%">
                <col width="55%">
                <col width="30%">
            </colgroup>
            <thead>         
                <tr class='warning'>
                    <th style="text-align:left">#</th>
                    <th>Material</th>
                    <th style="text-align:right">Total</th>
                </tr>
            </thead>
            <tbody>
            <?php echo e($i=1); ?>

            <?php $__empty_1 = true; $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="text-align:left"><?php echo e($i++); ?></td>
                    <td>
                        <?php echo e($material->conveniosdetalles->material_cliente); ?> 
                       
                    </td>
                    <td style="text-align:right">
                    
                        <strong><?php echo e($material->total_planta); ?> <?php echo e($material->conveniosdetallesAll->CatUnidadMedida->clave); ?></strong>   
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3">No se han registrado materiales</td>
                </tr>
            <?php endif; ?>   
               
            </tbody>
        </table> 
    </div>
    </br>
    </br>
    <p>Total de materiales: <strong><?php echo e($totalreg); ?></strong> </p>
    </br>
    <!-- <p>Fecha impresion: <strong><?php echo e($mytime); ?></strong> </p> -->
    <p>Entrada: <strong><?php echo e(substr(optional($horarios)->hora_llegada_planta,11,5)); ?></strong>
    &nbsp;&nbsp;&nbsp; -&nbsp;&nbsp; &nbsp;
    Salida: <strong><?php echo e(substr(optional($horarios)->hora_salida_planta,11,5)); ?></strong></p> 
    </br>
    <p><?php echo e($cadena); ?></p>

</body>
</html><?php /**PATH C:\xampp\htdocs\sgd\resources\views\myPDF\myPDF.blade.php ENDPATH**/ ?>