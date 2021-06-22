//Especialista.
//En Listar pacientes asignados, a medida que se vaya escribiendo el filtro deseado se irán mostrando los pacientes cuyo nombre contenga el texto que se vaya escribiendo.Se llevará a cabo a través de AJAX, sin cambiar de página y reflejando los cambios en el listado desde que haya 2 caracteres mínimo en el campo de filtro y después de 100 ms sin teclear nada.
const searchBar = document.getElementById('searchBar');

searchBar.addEventListener('keyup', delay((e) => {
    if(e.target.value.length >= 2 || e.target.value.length == 0){
        ajax(e.target.value);
    }
}), 10000);

function delay(fn, ms) {
  let timer = 0
  return function(...args) {
    clearTimeout(timer)
    timer = setTimeout(fn.bind(this, ...args), ms || 0)
  }
}

function ajax(texto) {
    const http = new XMLHttpRequest();
    const url = '../panelUsuario/añadirHistorial.php'
    http.open("POST", url, true);
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    document.getElementById("response").innerHTML = null
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("response").innerHTML = this.responseText
        }
    }

    http.send("either=filtrar&Query=" + texto);
}
//Paciente.
//En Listar especialistas asignados se podrá eliminar la asignación de un especialista.Se realizará usando AJAX, sin cambiar de página, eliminando la asignación de la base de datos y reflejando los cambios en el listado mostrado.
function deleteEspecialista(idespecialista, idpaciente) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var res = JSON.parse(this.responseText);
            if (res.deleted === true) {
                var fila = document.querySelector('#fila' + idespecialista);
                fila.parentNode.removeChild(fila);
            }
        }
    };
    ajax.open("post", "../delete_especialista_json.php", true);
    ajax.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    ajax.send(JSON.stringify({ "idespecialista": idespecialista, "idpaciente": idpaciente }));
}