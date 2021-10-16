    const btnSearch = document.querySelector('#btnBusqueda')
    btnSearch.addEventListener('click', () => {
        let codigo = $("input#codigo").val();
            $("#tbody tr").remove(); 
                $.ajax({
                url: 'php/import.php',
                type: 'POST',
                data: {codigo},
                success:(res) => {
                    let js= JSON.parse(res);
                    let tabla;
                    for (i = 0; i < js.length; i++) {
                        tabla+=`<tr><td>${js[i].Nombre}</td>
                                <td>${js[i].Codigo}</td>
                                <td>${js[i].Servicio}</td>
                                <td>${js[i].Prestamo}</td>
                                <td>${js[i].Grupo}</td>
                                <td>${js[i].Alumnos}</td>
                                <td>${js[i].Turno}</td>
                                <td>${js[i].Ingreso}</td>
                                <td>${js[i].Categoria}</td></tr>`;
                    }
                    $('#tbody').html(tabla);
                    if(tabla == null){
                        alert('Codigo incompleto');
                    }
        }
    });
    })

