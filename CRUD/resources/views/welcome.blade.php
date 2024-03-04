<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rico Jimenez - Empresas de diseño - PHP & MongoDB - CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/javascript.js') }}"></script>



</head>

<body>
    <nav class="navbar">
        <div class="Name-enterprise">
        <p>RJ MULTIDISEÑO</p>
    </div>
        <span class="navbar-text">
                <p>Alumno: Luis Alberto Rico Jimenez</p>
                <p>Grupo: 5-2</p>
        </span>
        <img src="{{ asset('assets/fotomia.png') }}" alt="Foto Mía" class="navbar-photo" width="100">
    </nav>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b>enterprises</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addenterprisesModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New enterprises</span></a>
                            <a href="#deleteenterprisesModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>Nombre de la Empresa</th>
                            <th>Descripción</th> 
                            <th>Correo Electrónico</th>
                            <th>Ubicación</th>
                            <th>Teléfono</th>
                            <th>Acciones</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Campos de la empresa -->
                        <tr id="fila_1">
                            <td>1</td>
                            <td class="editable" data-campo="nombre_empresa">Empresa 1</td>
                            <td class="editable" data-campo="descripcion">Descripción 1</td>
                            <td class="editable" data-campo="correo_electronico">empresa1@example.com</td>
                            <td class="editable" data-campo="ubicacion">Ubicación 1</td>
                            <td class="editable" data-campo="telefono">123456789</td>
                            <td>
                                <button class="btn btn-primary editar-empresa" onclick="editarEmpresa(1)"><i
                                        class="material-icons">&#xE254;</i></button>
                                <button id="guardarEmpresaBtn_1" class="btn btn-success guardar-empresa"
                                    onclick="guardarEmpresa(1)" style="display: none;"><i
                                        class="material-icons">&#xE161;</i></button>
                                <button id="cancelarEdicionBtn_1" class="btn btn-danger cancelar-edicion"
                                    onclick="cancelarEdicion(1)" style="display: none;"><i
                                        class="material-icons">&#xE14C;</i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add enterprises Modal HTML -->
    <div id="addenterprisesModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addenterprisesForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Empresa</h4>
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
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick="deleteEnterprises()">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Asignatura: BASE DE DATOS PARA CÓMPUTO EN LA NUBE</p>
                <p>Alumno: Luis Alberto Rico Jimenez</p>
            </div>
            <div class="col-md-6 text-right">
                <img src="{{ asset('assets/logo.png') }}" alt="Logotipo del Alumno" width="180"
                    style="border-radius: 15px;">
            </div>
        </div>
    </div>
</footer>

</html>
