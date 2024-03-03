<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {        
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title .btn-group {
        float: right;
    }
    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }   
    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }   
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
    /* Custom checkbox */
    .custom-checkbox {
        position: relative;
    }
    .custom-checkbox input[type="checkbox"] {    
        opacity: 0;
        position: absolute;
        margin: 5px 0 0 3px;
        z-index: 9;
    }
    .custom-checkbox label:before{
        width: 18px;
        height: 18px;
    }
    .custom-checkbox label:before {
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        background: white;
        border: 1px solid #bbb;
        border-radius: 2px;
        box-sizing: border-box;
        z-index: 2;
    }
    .custom-checkbox input[type="checkbox"]:checked + label:after {
        content: '';
        position: absolute;
        left: 6px;
        top: 3px;
        width: 6px;
        height: 11px;
        border: solid #000;
        border-width: 0 3px 3px 0;
        transform: inherit;
        z-index: 3;
        transform: rotateZ(45deg);
    }
    .custom-checkbox input[type="checkbox"]:checked + label:before {
        border-color: #03A9F4;
        background: #03A9F4;
    }
    .custom-checkbox input[type="checkbox"]:checked + label:after {
        border-color: #fff;
    }
    .custom-checkbox input[type="checkbox"]:disabled + label:before {
        color: #b8b8b8;
        cursor: auto;
        box-shadow: none;
        background: #ddd;
    }
    /* Modal styles */
    .modal .modal-dialog {
        max-width: 400px;
    }
    .modal .modal-header, .modal .modal-body, .modal .modal-footer {
        padding: 20px 30px;
    }
    .modal .modal-content {
        border-radius: 3px;
    }
    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }
    .modal .modal-title {
        display: inline-block;
    }
    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }
    .modal textarea.form-control {
        resize: vertical;
    }
    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }   
    .modal form label {
        font-weight: normal;
    }   
</style>
<script>
    // Función para manejar la acción de editar empresa
    function editarEmpresa(id) {
        // Obtener la fila actual
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
            url: 'http://localhost:8000/api/enterprises/update/' + id,
            type: 'PUT',
            data: datos,
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
                            cargarEmpresas(); // Volver a cargar los datos de la tabla después de la eliminación
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
                        '<input type="checkbox" id="checkbox' + empresa._id + '" name="options[]" value="' + empresa._id + '">' +
                        '<label for="checkbox' + empresa._id + '"></label>' +
                        '</span>' +
                        '</td>' +
                        '<td>' + empresa._id + '</td>' +
                        '<td class="editable" data-campo="nombre_empresa">' + empresa.nombre_empresa + '</td>' +
                        '<td class="editable" data-campo="correo_electronico">' + empresa.correo_electronico + '</td>' +
                        '<td class="editable" data-campo="ubicacion">' + empresa.ubicacion + '</td>' +
                        '<td class="editable" data-campo="telefono">' + empresa.telefono + '</td>' +
                        '<td>' +
                        '<button class="btn btn-primary editar-empresa" onclick="editarEmpresa(\'' + empresa._id + '\')"><i class="material-icons">&#xE254;</i></button>' +
                        '<button class="btn btn-success guardar-empresa" onclick="guardarEmpresa(\'' + empresa._id + '\')" style="display: none;"><i class="material-icons">&#xE161;</i></button>' +
                        '<button class="btn btn-danger cancelar-edicion" onclick="cancelarEdicion(\'' + empresa._id + '\')" style="display: none;"><i class="material-icons">&#xE14C;</i></button>' +
                        '<button class="btn btn-danger delete" onclick="eliminarEmpresa(\'' + empresa._id + '\')"><i class="material-icons">&#xE872;</i></button>' +
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

    $(document).ready(function(){
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
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });
</script>


</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b>enterprises</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addenterprisesModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New enterprises</span></a>
                            <a href="#deleteenterprisesModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>                      
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>ID</th>
                            <th>Nombre de la Empresa</th>
                            <th>Correo Electrónico</th>
                            <th>Ubicación</th>
                            <th>Teléfono</th>
                            <th>Acciones</th> <!-- Nueva columna para acciones -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán las empresas -->
                        <tr id="fila_1">
                            <td>1</td>
                            <td class="editable" data-campo="nombre_empresa">Empresa 1</td>
                            <td class="editable" data-campo="correo_electronico">empresa1@example.com</td>
                            <td class="editable" data-campo="ubicacion">Ubicación 1</td>
                            <td class="editable" data-campo="telefono">123456789</td>
                            <td>
                                <button class="btn btn-primary editar-empresa" onclick="editarEmpresa(1)"><i class="material-icons">&#xE254;</i></button>
                                <button id="guardarEmpresaBtn_1" class="btn btn-success guardar-empresa" onclick="guardarEmpresa(1)" style="display: none;"><i class="material-icons">&#xE161;</i></button>
<button id="cancelarEdicionBtn_1" class="btn btn-danger cancelar-edicion" onclick="cancelarEdicion(1)" style="display: none;"><i class="material-icons">&#xE14C;</i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>1</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <!-- Paginación -->
                    </ul>
                </div>
            </div>
        </div>        
    </div>
    
    <!-- Add enterprises Modal HTML -->
    <div id="addenterprisesModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addenterprisesForm">
                <div class="modal-header">                     
                    <h4 class="modal-title">Agregar Empresa</h4> <!-- Cambio de "Add enterprises" a "Agregar Empresa" -->
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Nombre de la Empresa</label>
                        <input type="text" class="form-control" id="nombre_empresa" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" class="form-control" id="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label>Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" id="telefono" required>
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo_electronico" required>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Delete enterprises Modal HTML -->
    <div id="deleteenterprisesModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteenterprisesForm">
                <div class="modal-header">                     
                    <h4 class="modal-title">Delete enterprises</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <!-- Modifica el botón para pasar el _id como parámetro -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteenterprises()">Delete</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </body>
    </html>