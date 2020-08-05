//Seleccion de formulario segun id
var formulario = document.getElementById('formRegistro');

window.onload = iniciar();
function iniciar(){
  document.getElementById("enviarForm").addEventListener('click',validar, false);
}

function validarNombre(){
  var elemento = document.getElementById("inputName");
  if(elemento.value === ""){
    alert("El campo nombre no puede estar vacio");
    return false
  }
  return true;
}

function validarApellido(){
  var elemento = document.getElementById("inputApellido");
  if(elemento.value === ""){
    alert("El campo apellido no puede estar vacio");
    return false
  }
  return true;
}

function validarEmail(inputEmail){
  var elemento = document.getElementById("inputEmail");
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var esValido = regex.test(elemento.value);

  if (esValido === false) {
      alert("El correo no es valido");
  }
  return true;
    }

  function validarPass(){
    var pass = document.getElementById("inputPassword");
    var passConfirm = document.getElementById("password-confirm");
    var espacios = false;
    var cont = 0;

      if (espacios) {
        alert("La contraseña no puede tener espacios en blanco");
        return false;
      }

      if(pass.value.length === 0 || passConfirm.value.length === 0){

        alert("los campos de la password no pueden estar vacios");
        return false;
      }
      if(pass.value != passConfirm.value){
        alert("Las passwords deben coincidir");
        return false;


      }
        return true;


  }


//validacion de todas las funciones
function validar(e){
  if (validarNombre() && validarApellido() && validarEmail() && validarPass() && confirm("Pulsa aceptar si desea enviar el formulario")) {
return true;
}else {
  e.preventDefault();
  return false;
}
}
