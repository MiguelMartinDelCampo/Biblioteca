let name;

const inputSearch = document.querySelector('#busqueda');
inputSearch.addEventListener('keyup', () => {
    $(document).ready(() => {
        $("#resultadoBusqueda").html('<p>Codigo vacio</p>');});
        let valorBusqueda = $("input#busqueda").val();
        const data = document.querySelector('body');
        const categoria = data.dataset.cat;
        if (valorBusqueda != "") {
            $.post("php/consulta.php", {valorBusqueda, categoria},(mensaje) => {
                name = mensaje;
                document.getElementById('resultadoBusqueda').innerHTML = mensaje;
                let fecha = getDate();
                let hour = getHour();
                let fullfecha = fecha + '\t' + hour;   
                document.getElementById('fecha').innerHTML = fullfecha });
            } else {
                $("#resultadoBusqueda").html('<p>Codigo vacio</p>');
                document.getElementById('fecha').innerHTML = "";   
        };
})

const btnEnvio = document.querySelector('#btnEnvio');
btnEnvio.addEventListener('click', () => {
    let codigo = document.getElementById('busqueda').value;
    let servicio = document.getElementById('servicios');
    let grupo = document.getElementById('grupo');
    let turno = document.getElementById('turno');
    let prestamo = document.getElementById('prestamo');
    let service= servicio.options[servicio.selectedIndex].value;
    let group = grupo.options[grupo.selectedIndex].value;
    let turn = turno.options[turno.selectedIndex].value;
    let prest = prestamo.options[prestamo.selectedIndex].value;
    let numero = 1;
    
    let categoria = "Alumno";

    if (codigo.length < 9){
        alert('Codigo incompleto')
    }
    else{
        if(name == "<p>No hay ningún usuario con codigo</p>"){
            alert ('Error en el codigo');
        }
        else{
            let fecha = getDate();
            let hour = getHour();
            let fullfecha = `${fecha} \t ${hour}`;
    
            let datosingreso = [name, fullfecha, codigo, service, prest, group, numero, turn, categoria, fecha];
    
            $.ajax({
                type: "POST",
                url: "php/ingreso.php",
                data: {datosingreso},
                success: (response) => {
                    console.log(response);
                }
            });
            location.href="index.html";
            alert("Registro Guardado");
        }
    }
})

const getDate = () => {
    let fecha = new Date();
    fecha = [fecha.getFullYear(),fecha.getMonth()+1,fecha.getDate()].join('-');
    return fecha;
}

const getHour = () => {
    let hour = new Date();
    hour = [hour.getHours(),hour.getMinutes()].join(':');
    return hour;
}