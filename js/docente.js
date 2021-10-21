let name;

document.addEventListener("DOMContentLoaded",() => {
$(document).ready(() => {
    $('#grupo').change(() => {
    if ($(this).val() === "Solo docente") {
        $('#numero').prop("disabled", true);
    } else {
        $('#numero').prop("disabled", false);
    }
    })
});
});

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
                let fullfecha =`${getDate()} \t ${getHour()}`;   
                document.getElementById('fecha').innerHTML = fullfecha });
            } else {
                $("#resultadoBusqueda").html('<p>Codigo vacio</p>');
                document.getElementById('fecha').innerHTML = "";   
        };
})

const btnEnvio = document.querySelector('#btnEnvio');
btnEnvio.addEventListener('click', () => {
    let servicio = document.getElementById('servicios');
    let prestamo = document.getElementById('prestamo');
    let grupo = document.getElementById('grupo');
    let turno = document.getElementById('turno');
    let codigo = document.getElementById('busqueda').value
    let numero = document.getElementById('numero').value;
    let fecha = getDate();
    let fullfecha = `${fecha} \t ${getHour()}`;
    
    let data ={
        servicio: servicio.options[servicio.selectedIndex].value,
        grupo: grupo.options[grupo.selectedIndex].value,
        turno: turno.options[turno.selectedIndex].value,
        prestamo: prestamo.options[prestamo.selectedIndex].value,
        categoria: "Docente",
        fullfecha,
        fecha,
        numero,
        name,
        codigo
    } 
    
    if (codigo.length < 7){
        alert('Codigo incompleto')
    }
    else{
        if(name == "<p>No hay ningún usuario con codigo</p>"){
            alert ('Error en el codigo');
        }
            else{
                let datosingreso = JSON.stringify(data);
                $.ajax({
                type: "POST",
                url: "php/ingreso.php",
                data: {datosingreso},
                success:(res) => {
                    if(res == true){
                        alert('Registo Guardado con exito', res);
                        location.href="index.html";
                    }else{
                        console.log('Ocurrio un error',res);
                    }
                }
        });
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
