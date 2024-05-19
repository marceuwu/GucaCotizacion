<?php
    include('bd.php');
    
    $sql = $conexion->prepare("SELECT * FROM `cotizaciones` ");
    $sql->execute();
    $listaProductos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cotización GUCA Distribución</title>
    <link rel='stylesheet' href='style.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <header class="header">
        <div class="row w-100">
            <div class="col-md-8 d-flex justify-content-start align-items-center">
                <div class="header-logo">
                    <img src="./img/logo.png" alt="GUCA Distribución" width="100">
                </div>
                <div class="header-title">
                    <h1>GUCA <br> DISTRIBUCIÓN</h1>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <div class="header-cotizacion">
                    <h2>COTIZACIÓN</h2>
                    <p>FOLIO: E # 833</p>
                    <p>FECHA: 30/01/2024</p>
                </div>
            </div>
        </div>
    </header>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="info">
                <div><strong>YAEL GUERRERO ROJAS</strong> </div>
                <div>CALLE LOS CACAHUATES # 54</div>
                <div>COL VALLE DE LOS OLIVOS C.P. 76902</div>
                <div>QUERÉTARO, QRO.</div>
                <div>R.F.C.: GURE020706HY6</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info2">
                <div><strong>RECEPTOR:</strong></div>
                <div><strong>EMPRESA:</strong></div>
                <div><strong>VENDEDOR:</strong> ERIC ROJAS</div>
              </div>
            </div>
        </div>
        <a href="reportes.php">Reporte pdf</a>
        <table>
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th>CANTIDAD</th>
                    <th>UNIDAD</th>
                    <th>DESCRIPCIÓN</th>
                    <th>OBSERVACIONES</th>
                    <th>PRECIO UNITARIO</th>
                    <th>IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaProductos as $producto) {?>
                <tr>
                    <td><?php echo $producto['item']; ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td><?php echo $producto['unidad']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['observaciones']; ?></td>
                    <td><?php echo $producto['precioUnitario']; ?></td>
                    <td><?php echo $producto['importe']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            
        </table>
        <div class="row">
            <div class="col-md-9 al text-center txt-terminos-condiciones">
                <h3><strong>TÉRMINOS Y CONDICIONES:</strong></h3>
                <p>*PAGOS DE CONTADO</p>
                <p>*ENVÍO A DOMICILIO GRATIS SI EL MONTO ES MAYOR A $3500, SI ES MENOR SE COBRA CONFORME LA DISTANCIA.</p>
                <p>**MATERIAL COTIZADO SALVO PREVIA VENTA</p>
                <p>*PRECIOS SUJETOS A EXISTENCIAS Y LISTAS ACTUALES</p>
                <p>*VIGENCIA DE 1 SEMANA</p>
                <p>*PRECIOS VÁLIDOS AL CONFIRMAR EL 100% DE LA COTIZACIÓN</p>
                <p>Importe Total: ( PESO 00/100 M.N.)</p>
            </div>
            <div class="col-md-3">
                <table clas="tabla2">
                    <tr>
                        <td><strong>SUBTOTAL</strong></td>
                        <td>$0.00</td>
                    </tr>
                    <tr>
                        <td><strong>IVA</strong></td>
                        <td>$0.00</td>
                    </tr>
                    <tr style="background-color: #30779D; color: white;">
                        <td><strong>TOTAL</strong></td>
                        <td>$0.00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <p>TELÉFONO: 442 457 5646, 442 862 4169</p>
    <p>CORREO: ventas@gucadistribucion.com</p>
    <p>MÉTODOS DE PAGO:</p>
    <p>*PAGO CON TARJETA.</p>
    <p>*PAGO EN EFECTIVO.</p>
    <p>*PAGO CON TRANSFERENCIA BANCARIA.</p>
    <p>BANCO: BBVA BANCOMER</p>
    <p>CLABE INTERBANCARIA: 012010055310535 5</p>

    
</body>
</html>