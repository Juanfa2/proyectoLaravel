var formulario = document.getElementById('formAddProduct');

window.onload = iniciar();
function iniciar(){
  document.getElementById("agregarProducto").addEventListener('click',validar, false);
}

function validarNombre(){
  var elemento = document.getElementById("inputNombre");
  if(elemento.value === ""){
    alert("El campo nombre no puede estar vacio");
    return false
  }
  return true;
}

function validarPrecio(){
  var elemento = document.getElementById("inputPrecio");
  if (elemento.value === "" ) {
    alert("El campo precio no puede estar vacio y debe estar expresado en numeros");
    return false;
  }
  if ( isNaN(elemento.value)) {
    alert("El campo precio no puede estar vacio y debe estar expresado en numeros");
    return false;
  }
  return true;
}
// El label de stock tiene (for="inputPrecio") deberiamos cambiarlo a inputStock?
function validarStock(){
  var elemento = document.getElementById("inputStock");
  if (elemento.value === "" ) {
    alert("El campo stock no puede estar vacio y debe estar expresado en numeros");
    return false;
  }
  if ( isNaN(elemento.value)) {
    alert("El campo stock no puede estar vacio y debe estar expresado en numeros");
    return false;
  }
  return true;
}

function validarDescripcion(){
  var elemento = document.getElementById("inputDescripcion");
  if(elemento.value === ""){
    alert("El campo descripcion no puede estar vacio");
    return false
  }
  return true;
}
/*
function validarCategorias(){
  var elemento = document.getElementById("categoria").selectedIndex;
var valor = elemento.value;
  if (valor === "selectedOption") {
    console.log(valor);
    alert("debe seleccionar una categoria");
    return false;
  }
  return true;
}*/
function validarCategorias(){
  var elemento = document.getElementById("categoria");
if(elemento.value == ""){
  alert("debes seleccionar una categoria");
  return false;
}
return true;
}
/*
function validarCategorias(){
  var optionForm = document.forms["formAddProduct"]["name"].selectedIndex;
  if (optionForm == 0) {
    alert("debe seleccionar una categoria");
    return false;
  }
  return true;
}*/

function validar(e){
  if (validarNombre() && validarPrecio() && validarStock() && validarDescripcion() && validarCategorias() && confirm("Pulsa aceptar si desea enviar el formulario")) {
return true;
}else {
  e.preventDefault();
  return false;
}
}
