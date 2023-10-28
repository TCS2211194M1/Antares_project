<?php
    require_once("../php/product.lib.php");
    
    $product = new Product();
    switch ($_POST["acc"]) {
        case 'list':
            $consultProduct = $product->consult();
            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
            while ($ren = $consultProduct->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='col'>
                    <div class='card shadow text-center' id='card'>
                        <img src='../image/cloud.png' alt='' id='img_product' class='ms-5'>
                        <div class='card-body'>
                            <h5 class='card-title fw-bold'>$ren[NOMBRE]</h5>
                            <p class='card-text'>$ren[LONG_DESCRIPTION]</p>
                            <p class='card-text text-start fs-5'>Precio: $$ren[PRODUCT_VALUE]</p>
                            <div>
                                <button class='btn btn-outline-primary btn-sm me-3 shadow' onclick='javascript:cargarCatalog(\"details\", $ren[T_PRODUCT]);'><i class='bi bi-card-text me-2'></i>Detalles</button>
                                <button class='btn btn-outline-danger shadow'><i class='bi bi-bag me-2'></i>Comprar</button>
                            </div>
                        </div>
                    </div>
                </div> ";
            }
            echo "</div>";
            break;
        case 'details':
            $consultProduct = $product->consultProduct($_POST["id"]);
            $ren = $consultProduct->fetch_array(MYSQLI_ASSOC);
            echo "<div class='row' id='row-details'>
                <div class='col-lg-6 text-center'>
                    <img src='../image/cloud.png' style='width: 60%;'>
                </div>
                <div class='col-lg-6 p-4 rounded-4 shadow' id='card-details'>
                    <h2 class='text-center bg-info-subtle bg-gradient rounded-4 mb-3 shadow p-3'>$ren[NOMBRE]: $ren[SHORT_DESCRIPTION]</h2>
                    <p class='fs-5'>$ren[LONG_DESCRIPTION]</p>
                    <h3 class='text-primary'>Precio: $$ren[PRODUCT_VALUE] $ren[C_MONEDA]</h3>
                    <hr class='border border-primary border-2'>
                    <p class='fs-5'>Periodicidad: $ren[PERIODICIDAD]</p>
                    <p class='fs-5'>Hosted Domains: $ren[HOSTED_DOMAINS]</p>
                    <p class='fs-5'>Size Required: $ren[REQUIRED_SIZE]</p>
                    <hr class='border border-primary border-2'>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <h5 text-center>Fecha de Inicio de Vigencia: $ren[FECHA_DE_INICIO_DE_VIGENCIA]</h5>
                        </div>
                        <div class='col-lg-6 text-end'>
                            <h5 class='text-center'>Fecha de Fin de Vigencia: $ren[FECHA_DE_FIN_DE_VIGENCIA]</h5>
                        </div>
                    </div>
                    <br>
                    <div class='text-center'>
                        <button class='btn btn-lg btn-outline-success shadow'><i class='bi bi-bag me-2'></i>Comprar</button>
                    </div>
                </div>
            </div>";
            break;
        default:
            echo "Error en productos";
            break;
    }
?>