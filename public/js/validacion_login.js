//-------LOGIN VADLIDACIONES
/*
function validar(){
inputEmail inputPassword  ids
  var email, pass;
  email = document.getElementById("inputEmail").value;
  pass = document.getElementById("inputPassword").value;

if(email === "" || pass === ""){
  alert("Todos los campos son obligatorios");
  return false;
}else if (email.length>45) {
  alert("la cantidad de caracteres la cantidad valida");
}else if (pass.length>150) {
  alert("la cantidad de caracteres la cantidad valida");
}
}

var elFormulario = document.querySelector('form-signin');
var losElementosDelFormulario = elFormulario.elements;
var valorDelCampoNombre = losElementosDelFormulario[0].value;
*/

<<<<<<< HEAD
window.onload = iniciar();
function iniciar(){
  document.getElementById("enviarForm").addEventListener('click',validar, false);
}
=======
>>>>>>> f6b597bc834aae7ae8293b8f9ef4adce712dcd13


var campoEmail = document.querySelector('input[name=email]');
var campoPass = document.querySelector('input[name=password]');
var elFormulario = document.querySelector('form-sigin');

elFormulario.onsubmit = function(evento){
  evento.preventDefault();
  console.log(formulario enviado);
}


campoEmail.onfocus = function(){

}
