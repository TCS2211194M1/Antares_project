<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Usuario</title>

<style>
 body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 30;
    background: rgb(0,12,24);
background: linear-gradient(180deg, rgba(0,12,24,1) 0%, rgba(1,82,161,1) 100%);
  }

  form {
    width: 500px; /* Ancho del formulario */
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Aplicar sombra al formulario */
    background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);
  }

  input {
    border-radius: 20px;
  border: 1px solid #c0c0c0;
  outline: 0 !important;
  box-sizing: border-box;
  padding: 10px 50px;
  margin-bottom: 10px;
    }

    label {
        display: block; /* Para que cada label esté en una línea */
        margin-bottom: 5px; /* Margen inferior para acercar el siguiente elemento */
        font-weight: bold; /* Texto en negrita */
        color: #333; /* Color del texto */
        font-family: 'Poppins', sans-serif; 
    }

.modify {
    font-family: 'Poppins', sans-serif;
    text-align: center; 
}

.uno {
 appearance: button;
 background-color: #1899D6;
 border: solid transparent;
 border-radius: 16px;
 border-width: 0 0 4px;
 box-sizing: border-box;
 color: #FFFFFF;
 cursor: pointer;
 display: inline-block;
 font-size: 15px;
 font-weight: 700;
 letter-spacing: .8px;
 line-height: 2px;
 margin: 25px;
 outline: none;
 overflow: visible;
 padding: 13px 19px;
 text-align: center;
 text-transform: uppercase;
 touch-action: manipulation;
 transform: translateZ(0);
 transition: filter .2s;
 user-select: none;
 -webkit-user-select: none;
 vertical-align: middle;
 white-space: nowrap;
}

.uno:after {
 background-clip: padding-box;
 background-color: #1CB0F6;
 border: solid transparent;
 border-radius: 16px;
 border-width: 0 0 4px;
 bottom: -4px;
 content: "";
 left: 0;
 position: absolute;
 right: 0;
 top: 0;
 z-index: -1;
}

.uno:main, button:focus {
 user-select: auto;
}

.uno:hover:not(:disabled) {
 filter: brightness(1.1);
}

.uno:disabled {
 cursor: auto;
}

.uno:active:after {
 border-width: 0 0 0px;
}

.uno:active {
 padding-bottom: 10px;
}

.editar-btn {
    height: 1.8em;
    width: 5em;
    background: transparent;
    -webkit-animation: jello-horizontal 0.9s both;
    animation: jello-horizontal 0.9s both;
    border: 2px solid #016dd9;
    outline: none;
    color: #016dd9;
    cursor: pointer;
    font-size: 17px;
    margin-left: 24px; /* Mover el botón a la derecha */
}

.editar-btn:hover {
  background: #016dd9;
  color: #ffffff;
  animation: squeeze3124 0.9s both;
}

@keyframes squeeze3124 {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }

  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }

  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }

  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }

  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }

  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

    }
    .match-border {
    border-color: green;
}

</style>
</head>
<body>

<form id="userForm" onsubmit="return saveData()">

<h2 class= "modify">MODIFICAR DATOS</h2>
<label for="Name">Nombre:</label><br>
<input type="text" id="Name" name="Name" value="John" disabled>
<button type="button" class="editar-btn" onclick="enableEdit('Name')">Editar</button><br>

<label for="lastName">Apellidos:</label><br>
<input type="text" id="lastName" name="lastName" value="Doe" disabled>
<button type="button" class="editar-btn" onclick="enableEdit('lastName')">Editar</button><br>

<label for="email">Correo Electrónico:</label><br>
<input type="email" id="email" name="email" value="example@example.com" disabled>
<button type="button" class="editar-btn" onclick="enableEdit('email')">Editar</button><br>

<label for="phone">Número de Teléfono:</label><br>
<input type="tel" id="phone" name="phone" value="123456789" disabled>
<button type="button" class="editar-btn" onclick="enableEdit('phone')">Editar</button><br>

<label for="password">Contraseña:</label><br>
<input type="password" id="password" name="password" value="password" disabled>
<button type="button" class="editar-btn" onclick="enableEdit('password')">Editar</button><br>
  <input type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordVisibility()" disabled>
  <label for="showPasswordCheckbox">Mostrar contraseña</label><br>

  <div id="confirmPasswordDiv" style="display: none;">
    <label for="confirmPassword">Confirmar Contraseña:</label><br>
    <input type="password" id="confirmPassword" name="confirmPassword" disabled>

    <span id="passwordMismatch" style="color: red; display: none;">Las contraseñas no coinciden.</span>
  </div>

  <button class="uno" type="submit">Guardar</button>
  <button class="uno "  type="button" onclick="confirmRedirect()">Regresar</button>
</form>

<script>
var saved = false;

function enableEdit(fieldName) {
    var field = document.getElementById(fieldName);
    field.disabled = false;
    field.focus();

    if (fieldName === 'password') {
      document.getElementById('confirmPasswordDiv').style.display = 'block';
      document.getElementById('confirmPassword').disabled = false;
      document.getElementById('showPasswordCheckbox').disabled = false; // Habilitar el checkbox
    } else {
      document.getElementById('confirmPasswordDiv').style.display = 'none';
      document.getElementById('confirmPassword').disabled = true;
      document.getElementById('showPasswordCheckbox').disabled = true; // Deshabilitar el checkbox
    }
  }

  function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('confirmPassword');
    var checkbox = document.getElementById('showPasswordCheckbox');

    if (checkbox.checked) {
      passwordInput.type = 'text';
      confirmPasswordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
      confirmPasswordInput.type = 'password';
    }
  }

  function saveData() {
  // Obtener los valores de los campos y guardarlos
  var NameValue = document.getElementById('Name').value;
  var lastNameValue = document.getElementById('lastName').value;
  var emailValue = document.getElementById('email').value;
  var phoneValue = document.getElementById('phone').value;
  var passwordValue = document.getElementById('password').value;
  var confirmPasswordValue = document.getElementById('confirmPassword').value;

  // Verificar si las contraseñas coinciden solo si se edita la contraseña
  if (document.getElementById('password').disabled === false && passwordValue !== confirmPasswordValue) {
    document.getElementById('passwordMismatch').style.display = 'block';
    document.getElementById('confirmPassword').classList.remove('match-border'); // Remover la clase match-border
    return false; // Evitar el envío del formulario
} else {
    document.getElementById('passwordMismatch').style.display = 'none';
    document.getElementById('confirmPassword').classList.add('match-border'); // Añadir la clase match-border
}

  // Actualizar los valores de los campos
  document.getElementById('Name').value = NameValue;
  document.getElementById('lastName').value = lastNameValue;
  document.getElementById('email').value = emailValue;
  document.getElementById('phone').value = phoneValue;

  // Deshabilitar los campos nuevamente excepto la contraseña si no se edita la contraseña
  var fields = document.querySelectorAll('input:not([type="submit"])');
  fields.forEach(function(field) {
    if (field.id !== 'password' && field.id !== 'confirmPassword' && field.disabled === false) {
      field.disabled = true;
    }
  });

  // Deshabilitar el campo de contraseña
  document.getElementById('password').disabled = true;

  // Desmarcar el checkbox si está marcado
  var checkbox = document.getElementById('showPasswordCheckbox');
  if (checkbox.checked) {
    checkbox.checked = false;
    togglePasswordVisibility(); // Ocultar la contraseña si está visible
  }

  // Ocultar el campo de confirmar contraseña nuevamente si no se edita la contraseña
  if (document.getElementById('password').disabled === true) {
    document.getElementById('confirmPasswordDiv').style.display = 'none';
  }

  // Evitar el envío del formulario
  return false;
}

function confirmRedirect() {
  // Verificar si se han realizado cambios en el formulario
  var NameValue = document.getElementById('Name').value;
  var lastNameValue = document.getElementById('lastName').value;
  var emailValue = document.getElementById('email').value;
  var phoneValue = document.getElementById('phone').value;
  var passwordValue = document.getElementById('password').value;
  var confirmPasswordValue = document.getElementById('confirmPassword').value;
  // Verificar si se han realizado cambios
  var changesMade = (
    NameValue !== "John" || 
    lastNameValue !== "Doe" || 
    emailValue !== "example@example.com" || 
    phoneValue !== "123456789" || 
    passwordValue !== "password" || 
    confirmPasswordValue !== "" // Assuming confirm password is empty by default
  );
  // Verificar si se han guardado los cambios
  var fieldsEnabled = false;
  var fields = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"]');
  
  // Verificar si algún campo está habilitado
  fields.forEach(function(field) {
    if (!field.disabled) {
      fieldsEnabled = true;
    }
  });
  
  // Verificar si la contraseña está habilitada
  var passwordEnabled = !document.getElementById('password').disabled;
  
  // Mostrar el mensaje de advertencia si al menos un campo (excepto la contraseña) está habilitado
  if (fieldsEnabled || passwordEnabled) {
    if (confirm('¿Está seguro de regresar? No se almacenarán los cambios realizados.')) {
      window.location.href = '../Antares_project/shop/catalog.php';
    }
  } else {
    // Redirigir directamente si ningún campo está habilitado
    window.location.href = '../Antares_project/shop/catalog.php';
  }
}
</script>
</body>
</html>
