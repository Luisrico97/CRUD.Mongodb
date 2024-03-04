// Función para manejar la acción de editar
function editarEmpresa(id) {
    var fila = $("#fila_" + id);

    // Cambiar la fila a modo de edición
    fila.find(".editable").each(function() {
        var valor = $(this).text();
        $(this).html('<input type="text" class="form-control" value="' + valor + '">');
    });

    // Ocultar botón de edición y mostrar botones de guardar y cancelar
    fila.find(".editar-empresa").hide();
    fila.find(".guardar-empresa, .cancelar-edicion").show();
}

// Función para manejar la acción de cancelar edición
function cancelarEdicion(id) {
    // Recargar los datos originales de la empresa
    cargarEmpresa(id);
}

// Función para cargar los datos originales de la empresa
function cargarEmpresa(id) {
    // Reemplaza la URL por la ruta correcta que permita solicitudes GET
    $.ajax({
        url: 'http://localhost:8000/api/enterprises/details/' + id, // Ejemplo de una ruta que permite GET
        type: 'GET',
        success: function(data) {
            // Actualizar la fila con los datos originales de la empresa
            var fila = $("#fila_" + id);
            fila.find(".editable").each(function() {
                var campo = $(this).attr("data-campo");
                $(this).html(data[campo]);
            });

            // Ocultar botones de guardar y cancelar y mostrar botón de edición
            fila.find(".guardar-empresa, .cancelar-edicion").hide();
            fila.find(".editar-empresa").show();
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar la empresa:', error);
        }
    });
}


// Función para manejar la acción de guardar empresa editada
function guardarEmpresa(id) {
    // Obtener los datos editados de la fila
    var datos = {};
    var fila = $("#fila_" + id);
    fila.find(".editable input").each(function() {
        var campo = $(this).parent().attr("data-campo");
        var valor = $(this).val();
        datos[campo] = valor;
    });

    // Realizar una solicitud AJAX para actualizar los datos de la empresa
    $.ajax({
        url: '/api/enterprises/update/' + id,
        type: 'POST',
        data: datos, // Aquí se utiliza la variable 'datos' en lugar de 'data'
        success: function(response) {
            // Recargar los datos actualizados de la empresa
            cargarEmpresa(id);
        },
        error: function(xhr, status, error) {
            console.error('Error al actualizar la empresa:', error);
        }
    });
}


// Función para manejar la acción de eliminar empresa
function eliminarEmpresa(id) {
    if (confirm("¿Estás seguro de que quieres eliminar esta empresa?")) {
        $.ajax({
            url: 'http://localhost:8000/api/enterprises/' + id,
            type: 'DELETE',
            success: function(response) {
                alert(response.response); // Mostrar mensaje de éxito
                cargarEmpresas(); // Volver a cargar los datos de la tabla después de la eliminación
            },
            error: function(xhr, status, error) {
                console.error('Error al eliminar la empresa:', error);
            }
        });
    }
}

// Función para eliminar empresas seleccionadas
function deleteEnterprises() {
    var checkboxes = $('table tbody input[type="checkbox"]:checked'); // Obtener todos los checkboxes seleccionados
    var ids = []; // Array para almacenar los IDs de las empresas seleccionadas

    // Recorrer todos los checkboxes seleccionados y obtener los IDs
    checkboxes.each(function() {
        ids.push($(this).val()); // Agregar el valor (ID) del checkbox al array
    });

    // Verificar si se seleccionaron empresas para eliminar
    if (ids.length > 0) {
        if (confirm("¿Estás seguro de que quieres eliminar estas empresas?")) {
            // Realizar una solicitud de eliminación para cada empresa seleccionada
            ids.forEach(function(id) {
                $.ajax({
                    url: 'http://localhost:8000/api/enterprises/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        console.log('Empresa eliminada con éxito:', id);
                        cargarEmpresas
                    (); // Volver a cargar los datos de la tabla después de la eliminación
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al eliminar la empresa:', error);
                    }
                });
            });
        }
    } else {
        alert("Por favor, selecciona al menos una empresa para eliminar.");
    }
}

// Función para cargar empresas y actualizar la tabla
function cargarEmpresas() {
    $.ajax({
        url: 'http://localhost:8000/api/enterprises',
        type: 'GET',
        success: function(data) {
            // Actualizar las filas de la tabla con botones de edición y eliminación
            var tbody = $('table tbody');
            tbody.empty();
            $.each(data, function(index, empresa) {
                var fila = '<tr id="fila_' + empresa._id + '">' +
                    '<td>' +
                    '<span class="custom-checkbox">' +
                    '<input type="checkbox" id="checkbox' + empresa._id +
                    '" name="options[]" value="' + empresa._id + '">' +
                    '<label for="checkbox' + empresa._id + '"></label>' +
                    '</span>' +
                    '</td>' +
                    '<td class="editable" data-campo="nombre_empresa">' + empresa
                    .nombre_empresa + '</td>' +
                    '<td class="editable" data-campo="descripcion">' + empresa.descripcion +
                    '</td>' +
                    '<td class="editable" data-campo="correo_electronico">' + empresa
                    .correo_electronico + '</td>' +
                    '<td class="editable" data-campo="ubicacion">' + empresa.ubicacion +
                    '</td>' +
                    '<td class="editable" data-campo="telefono">' + empresa.telefono + '</td>' +
                    '<td>' +
                    '<button class="btn btn-primary editar-empresa" onclick="editarEmpresa(\'' +
                    empresa._id + '\')"><i class="material-icons">&#xE254;</i></button>' +
                    '<button class="btn btn-success guardar-empresa" onclick="guardarEmpresa(\'' +
                    empresa._id +
                    '\')" style="display: none;"><i class="material-icons">&#xE161;</i></button>' +
                    '<button class="btn btn-danger cancelar-edicion" onclick="cancelarEdicion(\'' +
                    empresa._id +
                    '\')" style="display: none;"><i class="material-icons">&#xE14C;</i></button>' +
                    '<button class="btn btn-danger delete" onclick="eliminarEmpresa(\'' +
                    empresa._id + '\')"><i class="material-icons">&#xE872;</i></button>' +
                    '</td>' +
                    '</tr>';
                tbody.append(fila);
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar las empresas:', error);
        }
    });
}

$(document).ready(function() {
    // Cargar lista de empresas desde la API al cargar la página
    cargarEmpresas();

    // Función para agregar nueva empresa
    $('#addenterprisesForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: 'http://localhost:8000/api/enterprises/create',
            type: 'POST',
            data: {
                nombre_empresa: $('#nombre_empresa').val(),
                descripcion: $('#descripcion').val(),
                ubicacion: $('#ubicacion').val(),
                telefono: $('#telefono').val(),
                correo_electronico: $('#correo_electronico').val()
            },
            success: function(response) {
                $('#addenterprisesModal').modal('hide');
                cargarEmpresas();
            },
            error: function(xhr, status, error) {
                console.error('Error al agregar nuevas empresas:', error);
            }
        });
    });

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
        if (this.checked) {
            checkbox.each(function() {
                this.checked = true;
            });
        } else {
            checkbox.each(function() {
                this.checked = false;
            });
        }
    });
    checkbox.click(function() {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});