<?php
    require_once("../php/product.lib.php");
    
    function obtenerPeso(){
        $apiKey = '88e4875f5ed4d61812a382be';
        $url = 'https://open.er-api.com/v6/latest/USD';

        // Realiza la solicitud a la API de ExchangeRate-API
        $response = file_get_contents("$url?apikey=$apiKey");

        if ($response) {
            $data = json_decode($response, true);

            // Obtiene el valor actual del peso mexicano en relación con el dólar
            $valorPesoMexicano = $data['rates']['MXN'];

            // Muestra el resultado en la página
            return number_format($valorPesoMexicano, 4);
        } else {
            return "Error al obtener la tasa de cambio.";
        }
    }

    $product = new Product();
    $pesoMex = obtenerPeso();
    switch ($_POST["acc"]) {
        case 'list':
            $consultProduct = $product->consultProductCatalog();
            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
            while ($ren = $consultProduct->fetch_array(MYSQLI_ASSOC)) {
                $importeDecimales = $pesoMex * $ren['PRODUCT_VALUE'];
                $importe = number_format($importeDecimales, 2);
                echo "<div class='col'>
                    <div class='card shadow text-center' id='card'>
                        <img src='../image/cloud.png' alt='' id='img_product' class='ms-5'>
                        <div class='card-body'>
                            <h5 class='card-title fw-bold'>$ren[NOMBRE]</h5>
                            <p class='card-text'>$ren[LONG_DESCRIPTION]</p>
                            <p class='card-text text-start fs-5'>Precio: $importe MXN</p>
                            <div>
                                <button class='btn btn-outline-primary btn-sm me-3 shadow' onclick='javascript:cargarCatalog(\"details\", $ren[T_PRODUCT]);'><i class='bi bi-card-text me-2'></i>Detalles</button>
                                <button class='btn btn-outline-success shadow' onclick='javascript:cargarCatalog(\"buy\", $ren[T_PRODUCT]);'><i class='bi bi-bag me-2'></i>Comprar</button>
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
            $importeDecimales = $pesoMex * $ren['PRODUCT_VALUE'];
            $importe = number_format($importeDecimales, 2);
            echo "<div class='row'>
                <div class='col-lg-6 text-center'>
                    <img src='../image/cloud.png' style='width: 60%;'>
                    <div class='mb-3'><button class='btn btn-danger btn-sm' onclick='javascript:cargarCatalog(\"list\", null);'><i class='bi bi-arrow-left-square me-2'></i>Regresar al Catálogo</button></div>
                </div>
                <div class='col-lg-6 p-4 rounded-4 shadow' id='card'>
                    <h2 class='text-center bg-info-subtle bg-gradient rounded-4 mb-3 shadow p-3'>$ren[NOMBRE]: $ren[SHORT_DESCRIPTION]</h2>
                    <p class='fs-5'>$ren[LONG_DESCRIPTION]</p>
                    <h3 class='text-primary'>$importe MXN</h3>
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
                        <button class='btn btn-lg btn-outline-success shadow'  onclick='javascript:cargarCatalog(\"buy\", $ren[T_PRODUCT]);'><i class='bi bi-bag me-2'></i>Comprar</button>
                    </div>
                </div>
            </div>";
            break;
        case 'buy':
            $consultProduct = $product->consult($_POST["id"]);
            $consultFormaPago = $product->formaPago();
            $ren = $consultProduct->fetch_array(MYSQLI_ASSOC);
            $importeDecimales = $pesoMex * $ren['PRODUCT_VALUE'];
            $importe = number_format($importeDecimales, 2);
            echo "<div class='row'>
                    <div class='col-lg-6 text-center'>
                        <img src='../image/cloud.png' style='width: 60%;'>
                        <div class='mb-3'>
                            <button class='btn btn-danger btn-sm' onclick='javascript:cargarCatalog(\"list\", null);'><i class='bi bi-arrow-left-square me-2'></i>Regresar al Catálogo</button>
                        </div>
                    </div>
                    <div class='col-lg-6 p-4 rounded-4 shadow' id='card'>
                        <h2 class='text-center bg-primary-subtle bg-gradient rounded-4 mb-3 shadow p-3'>$ren[NOMBRE]: $ren[SHORT_DESCRIPTION]</h2>
                        <p class='fs-5'>$ren[LONG_DESCRIPTION]</p>
                        <h3 class='text-primary'>$importe MXN</h3>
                        <p class='fs-5'>Periodicidad: $ren[PERIODICIDAD]</p>
                        <hr class='border border-primary border-2'>
                        <p class='fs-5'>Hosted Domains: $ren[HOSTED_DOMAINS]</p>
                        <p class='fs-5'>Size Required: $ren[REQUIRED_SIZE]</p>
                       
                    </div>
                </div>
            
                <br>";
            
                //Div que contiene el input para validar el nombre del dominio
                echo "<h3>Elige el nombre de tu Dominio</h3>
                <div class='shadow rounded p-3' id='data-dominio'>
                    <div class='row'>
                        <form id='form-domain'>
                            <div class='input-group'>
                                <input type='text' class='form-control w-75' id='NAME_DOMAIN' placeholder='Ingresa el nombre de tu Dominio' aria-label='Ingresa el nombre de tu Dominio' aria-describedby='DNS'>
                                <input type='text' class='form-control' id='DNS' placeholder='.com .mx .net'>
                            </div>
                        </form>
                        <div class='text-center'>
                            <button class='btn btn-outline-success w-25 rounded mt-3'  onclick='javascript:validar();'>Validar</button>
                        </div>
                    </div>
                </div>

                <br>
        
            <form id='form-comprar' style='display: none;'>
                <input type='hidden' value='$_POST[id]' id='ID'/>
                <input type='hidden' value='$importe' id='IMPORTE'/>
               
                <br>

                <h3>Métodos de Pago</h3>
            
                <div class='p-3'>
                    <div class='row'>
                        <div class='shadow rounded p-3 col-lg-3 me-3' id='data-general'>";
                            while ($ren = $consultFormaPago->fetch_array(MYSQLI_ASSOC)) {
                                if ($ren["DESCRIPCION"] == "PayPal") {
                                echo "<div class='row mb-2'>
                                    <div class='col-lg-7'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                            <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]
                                                <img src='../image/paypal.png' class='img-fluid ms-5' style='width: 32px; height: 32px;'>
                                            </label>
                                        </div>
                                    </div>
                                </div>";
                                } else if($ren["DESCRIPCION"] == 'Tarjeta de credito' or $ren["DESCRIPCION"] == 'Tarjeta de debito'){
                                echo "<div class='row mb-2'>
                                    <div class='col-lg-9'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                            <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]
                                                <img src='../image/visa.png' class='img-fluid' style='width: 32px; height: 32px;'>
                                            </label>
                                        </div>
                                    </div>
                                </div>";
                            } else if($ren["DESCRIPCION"] == 'Efectivo' or $ren["DESCRIPCION"] == 'Efectivo'){
                                echo "<div class='row mb-2'>
                                    <div class='col-lg-9'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                            <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]
                                              
                                            </label>
                                        </div>
                                    </div>
                                </div>";
                            } else if($ren["DESCRIPCION"] == 'Transferencia electronica de fondos' or $ren["DESCRIPCION"] == 'Trasferencia'){
                                echo "<div class='row mb-2'>
                                    <div class='col-lg-9'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                            <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]
                                              
                                            </label>
                                        </div>
                                    </div>
                                </div>";
                                } else{
                                   // echo "<div class='form-check'>
                                     //   <input class='form-check-input' type='radio' name='radioFormaPago' id='$ren[C_FORMAPAGO]' onclick='javascript:formaPago($ren[C_FORMAPAGO], $importe)'>
                                       // <label class='form-check-label' for='radioFormaPago'>$ren[DESCRIPCION]</label>
                                    //</div>";
                                }
                            }
                        echo "</div>
                        <br>
                        <div class='shadow rounded p-3 col-lg-6' id='data-pay'></div>
                    </div>
                </div>
            </form>
            <div class='text-center mt-5' id='buttons-pay'></div>";
            
            break;
         default:
            echo "Error en productos";
            break;
    }
?>