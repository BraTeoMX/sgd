<!DOCTYPE html>
<html>
<head>
    <title>Permisos</title>
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
    <div id="encabezado">
        <table style="width:100%; align:center">
        <tr>
            <td width=30% style="text-align:center"><img src="../public/img/logo.png" width="100px" heigth="82px" ></td>
            <td width=30%>&nbsp;</td>
            <td style="text-align:center; font-size: 10px" >Folio: <?php echo e($id); ?></td>       
         </tr>
         <tr>
            <td style="text-align:center; font-size: 10px " colspan =3><p >AUTORIZACION DE ENTRADA-SALIDA DEL PERSONAL</p></td>
         </tr>
        </table>
        <?php $__empty_1 = true; $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <table style="width:100%; align:center; font-size: 10px ">
            <tr>
                <td>Fecha: </td>
                <td><b> <?php echo e(optional($per)->fecha_solicitud); ?> </b></td>
                <td colspan=2>&nbsp;</td>
                <td>Area: </td>
                <td><b> <?php echo e(optional($per)->Departamento); ?></b></td>
            </tr>
            <tr>
                <td>De: </td>
                <td><b><?php echo e($per->Nom_Emp.' '.$per->Ap_Pat.' '.$per->Ap_Mat); ?></b></td>
                <td>Num.: </td>
                <td><b><?php echo e($per->No_Empleado); ?></b></td>
                <td>Turno: </td>
                <td><b><?php echo e($per->Id_Turno); ?></b></td>
            </tr>
            <tr>
                <td>Frecuencia: </td>
                <td><b> </b></td>
            </tr>

            <tr>
                <td colspan=6>Por medio del presente, solicito me sea otorgado un periodo vacacional de <?php echo e(optional($per)->folio_per); ?> días laborables </td>
                
            </tr>
            <tr>
                <td>Fecha de Ingreso: </td>
                <td><b> <?php echo e(optional($per)->folio_per); ?></b></td>
            </tr>
        </table>

    </div>
    <div id="customers">
        <table style="width:100%; border: solid 1px #000; border-collapse: collapse; font-size: 10px ">
            <thead>         
                <tr class='warning' style="border: solid 1px #000; border-collapse: collapse;">
                    <th style="border: solid 1px #000; border-collapse: collapse;">Dias Disponibles  <?php echo e(optional($per)->folio_per); ?> correspondientes al periodo de 2022 -2023, a disfrutar del  <?php echo e($per->fech_ini_per); ?> al  <?php echo e($per->fech_fin_per); ?></th>
                </tr>
               
            </thead>
            <tbody>
                <tr class='warning' style="border: solid 1px #000; border-collapse: collapse;">
                    <th style="border: solid 1px #000; border-collapse: collapse;">Menos  <?php echo e(optional($per)->folio_per); ?> dias solicitados en este memorándum, restan por disfrutar  <?php echo e(optional($per)->folio_per); ?> días</th>
                </tr>
                        </tbody>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       <?php endif; ?>                  
 
        <br>
        <table style="width:100%; align:center; font-size: 10px " >
            <tr style="text-align:center;"  >
                <td><strong>Director o Gerente de Area</strong></td>
                <td><strong>Firma del Solicitante</strong></td>
            </tr>
            <tr style="text-align:center;">
                <td><br><br><br><br><br></td>
            </tr>
        </table>
        <table style="width:100%; align:center; font-size: 10px " >
            <tr style="text-align:center;" >
                <td>Fecha: <strong></strong></td>
                <td> Hora: <strong></strong></td>
                <td>Periodo: <strong></strong></td>
            </tr>
        </table>
       
    </div>
    </br>
    <p  style="width:100%; align:left; font-size: 10px "><?php echo e($cadena); ?></p>

</body>
</html><?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/consultaPermisos/ticketPDF.blade.php ENDPATH**/ ?>