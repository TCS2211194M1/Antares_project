<?php
require_once("../Antares_project/php/client.lib.php");

if (isset($_POST["create"])) {
    session_start();
    $client = new Client();

    // Agregar el campo de país al array $_POST
    $_POST["t_pais"] = $_POST["t_pais"];

    $consult = $client->addClient($_POST);
    if ($consult == 0) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error: </strong>No se pudo crear la cuenta
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } else if ($consult == 1) {
        $_SESSION["account"] = 1;
        $_SESSION["username"] = htmlentities($_POST["username"]);
        $_SESSION["name"] = htmlentities($_POST["name"]);
        $_SESSION["last_name"] = htmlentities($_POST["last_name"]);
        $_SESSION["email"] = htmlentities($_POST["email"]);
        $_SESSION["password"] = htmlentities($_POST["password"]);
        $_SESSION["cellphone"] = htmlentities($_POST["cellphone"]);
        $_SESSION["account"] = 1;

       // header("Location: ../Antares_project/shop/catalog.php");
        // Redirigir al usuario a la página de registro exitoso
        header("Location: registroExitoso.php");
        exit(); // Asegurar que el script se detenga después de la redirección
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/stylesAccount.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="image/cloud.png">
    <title>Create Account</title>
</head>

<body id="body-account">
    <div class="container w-75 bg-gradient bg-info my-4 rounded-3 shadow">
        <div class="row align-items-stretch">
            <div class="col d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded-start" id="container-image">
                <img src="image/nube4.jpg" width="100%" height="100%" >
            </div>
            <div class="col bg-white p-3 rounded-end">
                <div class="text-end">
                    <img src="image/A113.png" width="90px" class="rounded-3" id="logo-samava">
                </div>

                <h2 class="fw-bold text-center py-3">Bienvenido</h2>
            
                <!-- LOGIN -->
                <form method="POST" onsubmit="return validatePasswords()">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre" id="NAME" required oninput="convertirAMayusculas(this)">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="last_name" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Ingresa tus Apellidos" id="LAST_NAME" required oninput="convertirAMayusculas(this)">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa tu Email" id="EMAIL" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingresa la contraseña" id="PASSWORD" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirma la contraseña" id="CONFIRM_PASSWORD" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="username" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="username" placeholder="Ingresa el nombre de usuario" id="USERNAME" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone" class="form-label">Número de Teléfono</label>
                        <input type="text" class="form-control" name="cellphone" placeholder="Ingresa tu Número de Teléfono (solo 10 números)" id="CELLPHONE" required oninput="validarTelefono(this)">
                    </div>
                    <div class="mb-4">
                        <label for="country" class="form-label">País</label>
                        <select class="form-select" name="t_pais" id="t_pais">
                        <option value="" selected>Selecciona tu país</option>
                            <option value="001">Afganistán</option>
                            <option value="002">Islas Aland</option>
                            <option value="003">Albania</option>
                            <option value="004">Alemania</option>
                            <option value="005">Andorra</option>
                            <option value="006">Angola</option>
                            <option value="007">Anguila</option>
                            <option value="008">Antártida</option>
                            <option value="009">Antigua y Barbuda</option>
                            <option value="010">Arabia Saudita</option>
                            <option value="011">Argelia</option>
                            <option value="012">Argentina</option>
                            <option value="013">Armenia</option>
                            <option value="014">Aruba</option>
                            <option value="015">Australia</option>
                            <option value="016">Austria</option>
                            <option value="017">Azerbaiyán</option>
                            <option value="018">Bahamas (las)</option>
                            <option value="019">Bangladés</option>
                            <option value="020">Barbados</option>
                            <option value="021">Baréin</option>
                            <option value="022">Bélgica</option>
                            <option value="023">Belice</option>
                            <option value="024">Benín</option>
                            <option value="025">Bermudas</option>
                            <option value="026">Bielorrusia</option>
                            <option value="027">Myanmar</option>
                            <option value="028">Bolivia, Estado Plurinacional de</option>
                            <option value="029">Bosnia y Herzegovina</option>
                            <option value="030">Botsuana</option>
                            <option value="031">Brasil</option>
                            <option value="032">Brunéi</option>
                            <option value="033">Bulgaria</option>
                            <option value="034">Burkina Faso</option>
                            <option value="035">Burundi</option>
                            <option value="036">Bután</option>
                            <option value="037">Cabo Verde</option>
                            <option value="038">Camboya</option>
                            <option value="039">Camerún</option>
                            <option value="040">Canadá</option>
                            <option value="041">Catar</option>
                            <option value="042">Bonaire, San Eustaquio y Saba</option>
                            <option value="043">Chad</option>
                            <option value="044">Chile</option>
                            <option value="045">China</option>
                            <option value="046">Chipre</option>
                            <option value="047">Colombia</option>
                            <option value="048">Comoras</option>
                            <option value="049">Corea del Norte</option>
                            <option value="050">Corea del Sur</option>
                            <option value="051">Costa de Marfil</option>
                            <option value="052">Costa Rica</option>
                            <option value="053">Croacia</option>
                            <option value="054">Cuba</option>
                            <option value="055">Curazao</option>
                            <option value="056">Dinamarca</option>
                            <option value="057">Dominica</option>
                            <option value="058">Ecuador</option>
                            <option value="059">Egipto</option>
                            <option value="060">El Salvador</option>
                            <option value="061">Emiratos Árabes Unidos</option>
                            <option value="062">Eritrea</option>
                            <option value="063">Eslovaquia</option>
                            <option value="064">Eslovenia</option>
                            <option value="065">España</option>
                            <option value="066">Estados Unidos</option>
                            <option value="067">Estonia</option>
                            <option value="068">Etiopía</option>
                            <option value="069">Filipinas</option>
                            <option value="070">Finlandia</option>
                            <option value="071">Fiyi</option>
                            <option value="072">Francia</option>
                            <option value="073">Gabón</option>
                            <option value="074">Gambia</option>
                            <option value="075">Georgia</option>
                            <option value="076">Ghana</option>
                            <option value="077">Gibraltar</option>
                            <option value="078">Granada</option>
                            <option value="079">Grecia</option>
                            <option value="080">Groenlandia</option>
                            <option value="081">Guadalupe</option>
                            <option value="082">Guam</option>
                            <option value="083">Guatemala</option>
                            <option value="084">Guayana Francesa</option>
                            <option value="085">Guernsey</option>
                            <option value="086">Guinea</option>
                            <option value="087">Guinea-Bisáu</option>
                            <option value="088">Guinea Ecuatorial</option>
                            <option value="089">Guyana</option>
                            <option value="090">Haití</option>
                            <option value="091">Honduras</option>
                            <option value="092">Hong Kong</option>
                            <option value="093">Hungría</option>
                            <option value="094">India</option>
                            <option value="095">Indonesia</option>
                            <option value="096">Irak</option>
                            <option value="097">Irán</option>
                            <option value="098">Irlanda</option>
                            <option value="099">Isla Bouvet</option>
                            <option value="100">Isla de Man</option>
                            <option value="101">Isla de Navidad</option>
                            <option value="102">Isla Norfolk</option>
                            <option value="103">Islandia</option>
                            <option value="104">Islas Caimán</option>
                            <option value="105">Islas Cocos</option>
                            <option value="106">Islas Cook</option>
                            <option value="107">Islas Feroe</option>
                            <option value="108">Islas Georgias del Sur y Sandwich del Sur</option>
                            <option value="109">Islas Heard y McDonald</option>
                            <option value="110">Islas Malvinas</option>
                            <option value="111">Islas Marianas del Norte</option>
                            <option value="112">Islas Marshall</option>
                            <option value="113">Islas Pitcairn</option>
                            <option value="114">Islas Salomón</option>
                            <option value="115">Islas Turcas y Caicos</option>
                            <option value="116">Islas Ultramarinas Menores de Estados Unidos</option>
                            <option value="117">Islas Vírgenes Británicas</option>
                            <option value="118">Islas Vírgenes de los Estados Unidos</option>
                            <option value="119">Israel</option>
                            <option value="120">Italia</option>
                            <option value="121">Jamaica</option>
                            <option value="122">Japón</option>
                            <option value="123">Jersey</option>
                            <option value="124">Jordania</option>
                            <option value="125">Kazajistán</option>
                            <option value="126">Kenia</option>
                            <option value="127">Kiribati</option>
                            <option value="128">Kuwait</option>
                            <option value="129">Laos</option>
                            <option value="130">Lesoto</option>
                            <option value="131">Letonia</option>
                            <option value="132">Líbano</option>
                            <option value="133">Liberia</option>
                            <option value="134">Libia</option>
                            <option value="135">Liechtenstein</option>
                            <option value="136">Lituania</option>
                            <option value="137">Luxemburgo</option>
                            <option value="138">Macao</option>
                            <option value="139">Macedonia del Norte</option>
                            <option value="140">Madagascar</option>
                            <option value="141">Malasia</option>
                            <option value="142">Malaui</option>
                            <option value="143">Maldivas</option>
                            <option value="144">Malí</option>
                            <option value="145">Malta</option>
                            <option value="146">Marruecos</option>
                            <option value="147">Martinica</option>
                            <option value="148">Mauricio</option>
                            <option value="149">Mauritania</option>
                            <option value="150">Mayotte</option>
                            <option value="151">México</option>
                            <option value="152">Micronesia</option>
                            <option value="153">Moldavia</option>
                            <option value="154">Mónaco</option>
                            <option value="155">Mongolia</option>
                            <option value="156">Montenegro</option>
                            <option value="157">Montserrat</option>
                            <option value="158">Mozambique</option>
                            <option value="159">Namibia</option>
                            <option value="160">Nauru</option>
                            <option value="161">Nepal</option>
                            <option value="162">Nicaragua</option>
                            <option value="163">Níger</option>
                            <option value="164">Nigeria</option>
                            <option value="165">Niue</option>
                            <option value="166">Noruega</option>
                            <option value="167">Nueva Caledonia</option>
                            <option value="168">Nueva Zelanda</option>
                            <option value="169">Omán</option>
                            <option value="170">Países Bajos</option>
                            <option value="171">Pakistán</option>
                            <option value="172">Palaos</option>
                            <option value="173">Palestina</option>
                            <option value="174">Panamá</option>
                            <option value="175">Papúa Nueva Guinea</option>
                            <option value="176">Paraguay</option>
                            <option value="177">Perú</option>
                            <option value="178">Polinesia Francesa</option>
                            <option value="179">Polonia</option>
                            <option value="180">Portugal</option>
                            <option value="181">Puerto Rico</option>
                            <option value="182">Reino Unido</option>
                            <option value="183">República Centroafricana</option>
                            <option value="184">República Checa</option>
                            <option value="185">Macedonia del Norte</option>
                            <option value="186">Congo</option>
                            <option value="187">República Democrática del Congo</option>
                            <option value="188">República Dominicana</option>
                            <option value="189">Reunión</option>
                            <option value="190">Ruanda</option>
                            <option value="191">Rumanía</option>
                            <option value="192">Rusia</option>
                            <option value="193">Sahara Occidental</option>
                            <option value="194">Samoa</option>
                            <option value="195">Samoa Americana</option>
                            <option value="196">San Bartolomé</option>
                            <option value="197">San Cristóbal y Nieves</option>
                            <option value="198">San Marino</option>
                            <option value="199">San Martín</option>
                            <option value="200">San Pedro y Miquelón</option>
                            <option value="201">San Vicente y las Granadinas</option>
                            <option value="202">Santa Elena, Ascensión y Tristán de Acuña</option>
                            <option value="203">Santa Lucía</option>
                            <option value="204">Santo Tomé y Príncipe</option>
                            <option value="205">Senegal</option>
                            <option value="206">Serbia</option>
                            <option value="207">Seychelles</option>
                            <option value="208">Sierra Leona</option>
                            <option value="209">Singapur</option>
                            <option value="210">Sint Maarten</option>
                            <option value="211">Siria</option>
                            <option value="212">Somalia</option>
                            <option value="213">Sri Lanka</option>
                            <option value="214">Suazilandia</option>
                            <option value="215">Sudáfrica</option>
                            <option value="216">Sudán</option>
                            <option value="217">Sudán del Sur</option>
                            <option value="218">Suecia</option>
                            <option value="219">Suiza</option>
                            <option value="220">Surinam</option>
                            <option value="221">Svalbard y Jan Mayen</option>
                            <option value="222">Tailandia</option>
                            <option value="223">Taiwán</option>
                            <option value="224">Tanzania</option>
                            <option value="225">Tayikistán</option>
                            <option value="226">Territorio Británico del Océano Índico</option>
                            <option value="227">Territorios Australes Franceses</option>
                            <option value="228">Timor Oriental</option>
                            <option value="229">Togo</option>
                            <option value="230">Tokelau</option>
                            <option value="231">Tonga</option>
                            <option value="232">Trinidad y Tobago</option>
                            <option value="233">Túnez</option>
                            <option value="234">Turkmenistán</option>
                            <option value="235">Turquía</option>
                            <option value="236">Tuvalu</option>
                            <option value="237">Ucrania</option>
                            <option value="238">Uganda</option>
                            <option value="239">Uruguay</option>
                            <option value="240">Uzbekistán</option>
                            <option value="241">Vanuatu</option>
                            <option value="242">Santa Sede</option>
                            <option value="243">Venezuela</option>
                            <option value="244">Vietnam</option>
                            <option value="245">Wallis y Futuna</option>
                            <option value="246">Yemen</option>
                            <option value="247">Yibuti</option>
                            <option value="248">Zambia</option>
                            <option value="249">Zimbabue</option>
                            <option value="250">Países no declarados</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-success" name="create">Registrarse</button>
                    </div>
                </form>
                <div class="my-3 text-center">
                    <span>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></span>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function convertirAMayusculas(elemento) {
            elemento.value = elemento.value.toUpperCase();
        }

        function validarTelefono(elemento) {
            // Remover caracteres no numéricos del valor del input
            let telefono = elemento.value.replace(/\D/g, '');

            // Limitar la longitud del número de teléfono a 10 dígitos
            telefono = telefono.slice(0, 10);

            // Actualizar el valor del input con el número de teléfono validado
            elemento.value = telefono;
        }

        function validatePasswords() {
            var password = document.getElementById("PASSWORD").value;
            var confirm_password = document.getElementById("CONFIRM_PASSWORD").value;

            if (password != confirm_password) {
                alert("¡Las contraseñas no coinciden, vuelve a intentarlo!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>