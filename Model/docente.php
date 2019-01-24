<?php
require 'crud_docente.php';
include ('../Controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Distributivo Admin - Docente</title>
    <!-- Bootstrap core CSS-->
    <link href="../View/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../View/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../View/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../View/css/sb-admin.css" rel="stylesheet">
    
    <!-- tables js -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link href="../View/css/tablastyle.css" rel="stylesheet">

    <!-- Sweet - Alert-->
    <script src="../View/vendor/sweet-alert/dist/sweetalert2.all.js"></script>
    <script src="../View/vendor/sweet-alert/dist/sweetalert2.all.min.js"></script>
    <script src="../View/vendor/sweet-alert/dist/sweetalert2.min.js"></script>
    <script src="../View/vendor/sweet-alert/dist/sweetalert2.min.js"></script>
    <!-- Sweet Alert Styles -->
    <link href="../View/vendor/sweet-alert/dist/sweetalert2.csss" rel="stylesheet">
    <link href="../View/vendor/sweet-alert/dist/sweetalert2.min.csss" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.html">Menu</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Datos</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Tablas:</h6>
            <a class="dropdown-item" href="../Model/docente.php">Docentes</a>
            <a class="dropdown-item" href="../Model/materia.php">Materias</a>
            <a class="dropdown-item" href="../Model/carrera.php">Carrera</a>
          </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="reportes.php">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Reportes</span>
            </a>
        </li>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">
         <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../View/index.html">Principal</a>
            </li>
            <li class="breadcrumb-item active">Docente</li>
          </ol>
          <!-- table -->
          <div class="container">
            <div class="row">    
              <div class="col-md-12">
                <h4>Docentes</h4>
                <form action="" method="post" enctype="multipart/form-data">
                  <!-- Modal  Edit-->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Docente..!</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <input type="hidden" required name="txtId" value="<?php echo $txtId;?>" id="txtId">
                          <label for="">Nombre:</label>
                          <input type="text" class="form-control" required name="txtName" value="<?php echo $txtName; ?>" placeholder="" id="txtName" require="">
                          <br>
                          <label for="">Apellido:</label>
                          <input type="text" class="form-control" required name="txtLastname" value="<?php echo $txtLastname; ?>" placeholder="" id="txtLastname" require="">
                          <br>
                          <label for="">Cédula:</label>
                          <input type="text" class="form-control" required name="txtIdent" value="<?php echo $txtIdent; ?>" placeholder="" id="txtIdent" require="">
                          <br>
                          <label for="">Descripcion:</label>
                          <input type="text" class="form-control" required name="txtDescription" value="<?php echo $txtDescription; ?>" placeholder="" id="txtDescription" require="">
                          <br>
                        </div>

                        <div class="modal-footer">
                          <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                          <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- Modal  Edit -->
                   <!-- Modal  disponibilidad-->
                   <div class="modal fade" id="disponibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Docente..!</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <input type="hidden" required name="txtId" value="<?php echo $txtId;?>" id="txtId">
                          <label for="">Nombre:</label>
                          <input type="text" class="form-control" required name="txtName" value="<?php echo $txtName; ?>" placeholder="" id="txtName" require="">
                          <br>
                          <label for="">Apellido:</label>
                          <input type="text" class="form-control" required name="txtLastname" value="<?php echo $txtLastname; ?>" placeholder="" id="txtLastname" require="">
                          <br>
                          <label for="">Cédula:</label>
                          <input type="text" class="form-control" required name="txtIdent" value="<?php echo $txtIdent; ?>" placeholder="" id="txtIdent" require="">
                          <br>
                          <label for="">Descripcion:</label>
                          <input type="text" class="form-control" required name="txtDescription" value="<?php echo $txtDescription; ?>" placeholder="" id="txtDescription" require="">
                          <br>
                        </div>

                        <div class="modal-footer">
                          <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                          <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- Modal  Disponibilidad -->

                  <div class="col col-xs-6 text-right">
                      <p data-placement="top" data-toggle="tooltip" title="Edit">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="material-icons">person</i>
                        </button> 
                      </p>
                  </div>                
                </form>
              </div>
          
              <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-hover">
                  <thead class="thead-dark">
                      <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Cédula</th>
                          <th>Descripcion</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <?php foreach($listarMaestros as $maestro){ ?>
                      <tr>
                          <td><?php echo $maestro['nombre'];?></td>
                          <td><?php echo $maestro['apellido']; ?></td>
                          <td><?php echo $maestro['identificador'];?></td>
                          <td><?php echo $maestro['description'];?></td>
                          <td>
                          <form action="" method="post">
                          <input type="hidden" name="txtId" value="<?php echo $maestro['id_maestro']; ?>">
                          
                          <button type="submit" class="btn btn-success btn-round btn-just-icon btn-sm" value="Seleccionar" name="accion"><i class="material-icons">edit</i></button>
                          <button value="btnEliminar" onclick="return Confirmar('¿Esta seguro que desea eliminar el registro?');" class="btn btn-danger btn-round btn-just-icon btn-sm" type="submit" name="accion"><i class="material-icons">close</i></button>
                          <button type="submit" class="btn btn-success btn-round btn-just-icon btn-sm" value="Seleccionar" name="accion"><i class="btn-warning material-icons">date_range</i></button>

                          </form>
                          </td>
                      </tr>
                  <?php }?>
                </table>
              </div>
            </div>
          </div>
          

        <!-- /.container-fluid -->
        </div>
      <!-- /.content-wrapper -->
      </div>
    <!-- /#wrapper -->
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseas salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Cerrar sesión" a continuación.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="../View/login.html">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../View/vendor/jquery/jquery.min.js"></script>
    <script src="../View/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../View/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../View/js/sb-admin.min.js"></script>
    
    <?php if($mostrarModal){?>
            <script>
              $('#exampleModal').modal('show');
            </script>
          <?php } ?>
          <script>
      function Confirmar(Mensaje) {
        return(confirm(Mensaje))?true:false;        
      }
    </script>
  </body>

</html>
