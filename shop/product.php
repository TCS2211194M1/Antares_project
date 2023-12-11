<?php
    require_once("../php/product.lib.php");
    
    $product = new Product();
    switch ($_POST["acc"]) {
        case 'list':
            $consultProduct = $product->consultProductCatalog();
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
                                <button class='btn btn-outline-primary btn-sm me-3 shadow' onclick='javascript:cargarCatalog(\"details\", $ren[T_PRODUCT]);'><i class='bi bi-card-text me-2'></i>Details</button>
                                <button class='btn btn-outline-danger shadow' onclick='javascript:cargarCatalog(\"buy\", $ren[T_PRODUCT]);'><i class='bi bi-bag me-2'></i>Buy</button>
                            </div>
                        </div>
                    </div>
                </div> ";
            }
            echo "</div>";
            break;
        case 'details':
            $consultProduct = $product->consult($_POST["id"]);
            $ren = $consultProduct->fetch_array(MYSQLI_ASSOC);
            echo "<div class='row'>
                <div class='col-lg-6 text-center'>
                    <img src='../image/cloud.png' style='width: 60%;'>
                    <div class='mb-3'><button class='btn btn-danger btn-sm' onclick='javascript:cargarCatalog(\"list\", null);'><i class='bi bi-arrow-left-square me-2'></i>Return Catalog</button></div>
                </div>
                <div class='col-lg-6 p-4 rounded-4 shadow' id='card-details'>
                    <h2 class='text-center bg-info-subtle bg-gradient rounded-4 mb-3 shadow p-3'>$ren[NOMBRE]: $ren[SHORT_DESCRIPTION]</h2>
                    <p class='fs-5'>$ren[LONG_DESCRIPTION]</p>
                    <h3 class='text-primary'>$$ren[PRODUCT_VALUE] $ren[C_MONEDA]</h3>
                    <p class='fs-5'>Periodicidad: $ren[PERIODICIDAD]</p>
                    <hr class='border border-primary border-2'>
                    <p class='fs-5'>Hosted Domains: $ren[HOSTED_DOMAINS]</p>
                    <p class='fs-5'>Size Required: $ren[REQUIRED_SIZE]</p>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <p text-center>Inicio de Vigencia: $ren[FECHA_DE_INICIO_DE_VIGENCIA]</p>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-12'>
                            <p class=''>Fin de Vigencia: $ren[FECHA_DE_FIN_DE_VIGENCIA]</p>
                        </div>
                    </div>
                    <br>
                    <div class='text-center'>
                        <button class='btn btn-lg btn-outline-success shadow'  onclick='javascript:cargarCatalog(\"buy\", $ren[T_PRODUCT]);'><i class='bi bi-bag me-2'></i>Buy</button>
                    </div>
                </div>
            </div>";
            break;
        case 'buy':
            $consultProduct = $product->consult($_POST["id"]);
            $consultFormaPago = $product->formaPago();
            $ren = $consultProduct->fetch_array(MYSQLI_ASSOC);

            echo "<div class='row'>
                    <div class='col-lg-6 text-center'>
                        <img src='../image/cloud.png' style='width: 60%;'>
                        <div class='mb-3'>
                            <button class='btn btn-danger btn-sm' onclick='javascript:cargarCatalog(\"list\", null);'><i class='bi bi-arrow-left-square me-2'></i>Return Catalog</button>
                        </div>
                    </div>
                    <div class='col-lg-6 p-4 rounded-4 shadow' id='card-details'>
                        <h2 class='text-center bg-info-subtle bg-gradient rounded-4 mb-3 shadow p-3'>$ren[NOMBRE]: $ren[SHORT_DESCRIPTION]</h2>
                        <p class='fs-5'>$ren[LONG_DESCRIPTION]</p>
                        <h3 class='text-primary'>$$ren[PRODUCT_VALUE] $ren[C_MONEDA]</h3>
                        <p class='fs-5'>Periodicidad: $ren[PERIODICIDAD]</p>
                        <hr class='border border-primary border-2'>
                        <p class='fs-5'>Hosted Domains: $ren[HOSTED_DOMAINS]</p>
                        <p class='fs-5'>Size Required: $ren[REQUIRED_SIZE]</p>
                        <div class='row'>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <p text-center>Inicio de Vigencia: $ren[FECHA_DE_INICIO_DE_VIGENCIA]</p>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12'>
                                <p class=''>Fin de Vigencia: $ren[FECHA_DE_FIN_DE_VIGENCIA]</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <br>";
            
                //Div que contiene el input para validar el nombre del dominio
                $importe=$ren["PRODUCT_VALUE"];
                echo "<h3>Elige el nombre de tu Dominio</h3>
                <div class='shadow rounded p-3' id='data-dominio'>
                    <div class='row'>
                        <form id='form-domain'>
                            <div class='input-group'>
                                <input type='text' class='form-control' id='NAME_DOMAIN' placeholder='Ingresa el nombre de tu Dominio' aria-label='Ingresa el nombre de tu Dominio' aria-describedby='COM'>
                                <span class='input-group-text' id='COM'>.com</span>
                                <input type='hidden' value='.com' id='DOMAIN_NAME'>
                            </div>
                        </form>
                        <div class='text-center'>
                            <button class='btn btn-outline-success w-25 rounded mt-3'  onclick='javascript:validar();'>Validar</button>
                        </div>
                    </div>
                </div>

                <br>

            <form id='form-comprar'>
                <input type='hidden' value='$ren[NOMBRE]' id='NOMBRE'/>
                <h3>Datos Generales</h3>
                <div class='shadow rounded p-3' id='data-general'>
                    <div class='row'>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='PAIS' placeholder='PAIS' required/>
                                <label for='floatingInput'>PAIS</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='ESTADO' placeholder='ESTADO' required/>
                                <label for='floatingInput'>ESTADO</label>
                            </div>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CP' placeholder='C.P' required/>
                                <label for='floatingInput'>C.P</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CIUDAD' placeholder='CIUDAD' required/>
                                <label for='floatingInput'>CIUDAD</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='CALLE' placeholder='CALLE' required/>
                                <label for='floatingInput'>CALLE Y NÚMERO EXT</label>
                            </div>
                        </div> 
                    </div>
                    <div class='row'>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='EMAIL' placeholder='EMAIL' required/>
                                <label for='floatingInput'>EMAIL</label>
                            </div>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-12'>
                            <div class='form-floating m-2 shadow'>
                                <input type='text' class='form-control' id='TELÉFONO' placeholder='TELÉFONO' required/>
                                <label for='floatingInput'>TELÉFONO</label>
                            </div>
                        </div>
                    </div>
                </div>
            
                <br>

                <h3>Métodos de Pago</h3>
            
                <div class='row'>
                    <div class='shadow rounded p-3 col-lg-3 me-3' id='data-general'>";
                        while ($ren = $consultFormaPago->fetch_array(MYSQLI_ASSOC)) {
                            if ($ren["DESCRIPCION"] == "PayPal") {
                            echo "<div class='row mb-2'>
                                <div class='col-lg-6'>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                        <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]</label>
                                    </div>
                                </div>
                                <div class='col-lg-6 text-end'>
                                    <img src='../image/paypal.png' alt='' id='cards'>
                                </div>
                            </div>";
                            } else if($ren["DESCRIPCION"] == 'Tarjeta de credito' or $ren["DESCRIPCION"] == 'Tarjeta de debito'){
                            echo "<div class='row mb-2'>
                            <div class='col-lg-8'>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                    <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]</label>
                                </div>
                            </div>
                            <div class='col-lg-4 text-end'>
                                <img src='../image/visa.png' alt='' id='cards'>
                                <img src='../image/master.png' alt='' id='cards'>
                            </div>
                            </div>";
                            } else{
                                echo "<div class='form-check'>
                                    <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                    <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]</label>
                                </div>";
                            }
                        }
                    echo "</div>
                    <br>
                    <div class='shadow rounded p-3 col-lg-6' id='data-pay'></div>
                </div>
            </form>
            <div class='text-center mt-5' id='buttons-pay'></div>";
            
            break;
        default:
            echo "Error en productos";
            break;
    }
?>