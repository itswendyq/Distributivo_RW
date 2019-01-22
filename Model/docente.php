<?php
require_once ('add.php');
$tra=new Trabajo();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
    $tra->addD();
    exit;
}
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

  <!-- Table Styles -->

  <link rel="stylesheet" href="../View/css/t_style.css">

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
            <a class="nav-link" href="index.html">
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

          <!-- TABLAS-->
          <div class="container">
            <div class="row">    
              <div class="col-md-12">
                <h4>Docentes</h4>
                <div class="col col-xs-6 text-right">
                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                      <button class="btn btn-primary btn-round btn-just-icon btn-sm" data-title="New" data-toggle="modal" data-target="#new" >
                        <i class="material-icons">person</i>
                      </button>
                    </p>
                </div>
                <div class="table-responsive">
                  <table id="mytable" class="table table-bordred table-striped">
                    <thead>                      
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Cedula</th>
                      <th>Descripcion</th>                  
                      <th>Editar</th>                        
                      <th>Eliminar</th>
                      <th>Disponibilidad</th>
                      </thead>
                      <tbody>
                        <?php
                          $tra= new Trabajo();
                          $datos=$tra->get_datosD();
                          for($i=0;$i<sizeof($datos);$i++)
                          {
                        ?>      
                        <tr>                        
                        <td><?php echo $datos[$i]["nombre"];?></td>
                        <td><?php echo $datos[$i]["apellido"];?></td>
                        <td><?php echo $datos[$i]["identificador"];?></td>
                        <td><?php echo $datos[$i]["description"];?></td>
                        <td><a  href="docente_edit.php#?id=<?php echo $datos[$i]["id_maestro"]; ?>"><p data-placement="top" data-toggle="tooltip"  title="Edit"><button class="btn btn-success btn-round btn-just-icon btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit"><i class="material-icons">edit</i></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-round btn-just-icon btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="material-icons">close</i></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Disponivilidad"><button class="btn btn-warning btn-round btn-just-icon btn-sm" data-title="Disponivilidad" data-toggle="modal" data-target="#Disponivilidad" ><i class="material-icons">date_range</i></button></p></td>

                        </tr>                        
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>        
                  </div>
                </div>
              </div>
          </div>
          
          <!-- Modal Crear -->
          <?php
            if(isset($_GET["m"]))
            {
                switch($_GET["m"])
                {
                    case '1':
                        ?>
                        <script type="text/javascript">
                          Swal('Ocurrio un Error.!!','Campos vacios','error')                         
                              
                          then((value) => {
                              window.location.href="docente.php";
                            });
                          
                          </script>
                        <?php
                    break;
                    case '2':
                        ?>
                        <script type="text/javascript">
                           Swal('Registro existoso!','Se guardaron correctamente los datos','success')                         
                              
                              then((value) => {
                                  window.location.href="docente.php";
                                });
                        </script>
                        <?php
                    break;
                }
            }
          ?>        
          <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
            <form name="form" action="" method="post">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title"style="text-align: center">Crear Nuevo Registro!</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label >Nombre:</label>
                      <input class="form-control " type="text" name="name">                
                    </div>
                    <div class="form-group">
                      <label >Apellido:</label>
                      <input class="form-control " type="text" name="lastname">                
                    </div>
                    <div class="form-group">
                      <label >Identificador:</label>
                      <input class="form-control " type="text"  name="ident">
                    </div>
                    <div class="form-group">
                      <label >Descripcion:</label>
                      <input class="form-control " type="text"  name="description">                
                    </div>
                  </div>                                   
                  <div class="modal-footer ">
                    <input type="hidden" name="grabar" value="si" />
                    <input type="submit" value="Crear" style="width: 100%;" class="btn btn-primary btn-lg" title="Crear" />
                  </div>
                </div>
                  <!-- /.modal-content --> 
              </div>

                    <!-- /.modal-dialog --> 
          </form>
          </div>
          <!-- Modal Editar -->
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <h4 class="modal-title custom_align" id="Heading">Editar Registro</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                      <label >Identificador</label>
                      <input class="form-control " type="text">
                    </div>
                    <div class="form-group">
                      <label >Nombre</label>              
                      <input class="form-control " type="text">
                    </div>
                    <div class="form-group">
                      <label >Identificador</label>
                      <input class="form-control " type="text">                
                    </div>
                  </div>
                
                <div class="modal-footer ">
                  <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                </div>
              </div>
                <!-- /.modal-content --> 
            </div>
                  <!-- /.modal-dialog --> 
          </div>

          <!-- Modal Disponivilidad -->



          <div class="modal fade" id="Disponivilidad" tabindex="-1" role="dialog" aria-labelledby="Disponivilidad" aria-hidden="true">
          <form name="form" action="" method="post">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"style="text-align: center">Editar Disponivilidad!</h4>
                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
          
                  
<table class="responsive-table responsive-table-input-matrix">
  <tr>
    <th></th>
    <th>Lunes</th>
    <th>Martes</th>
    <th>miercoles</th>
    <th>Jueves</th>
    <th>Viernes</th>

  </tr>
  <tr>
    <td data-th="Día">1°.-  07:00 a 08:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">2°.-  08:00 a 09:00</td>
    <div class="form-group">
      <td data-th="two_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">3°.-  09:00 a 10:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  
  <tr>
    <td data-th="Día">4°.-  10:00 a 11:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  
  <tr>
    <td data-th="Día">5°.-  11:00 a 12:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">6°.-  12:00 a 13:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">7°.-  13:00 a 14:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">8°.-  14:00 a 15:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">9°.-  15:00 a 16:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">10°.-  16:00 a 17:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
  <tr>
    <td data-th="Día">11°.-  17:00 a 18:00</td>
    <div class="form-group">
      <td data-th="One_Monday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Tuestay"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Wednesday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Thurstday"><input  class="form-control "  type="checkbox" /></td>
    </div>
    <div class="form-group">
      <td data-th="One_Friday"><input  class="form-control "  type="checkbox" /></td>
    </div>
  </tr>
 
</table>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
          
                <div class="modal-footer ">
                  <input type="hidden" name="grabar1" value="si" />
                  <input type="hidden" name="id"  value="<?php echo $_GET["id_maestro"]; ?>"/> 
                  <input type="submit" value="Actualizar" style="width: 100%;" class="btn btn-primary btn-lg" title="Actualizar"/>
                </div>
              </div>
                <!-- /.modal-content --> 
            </div>
            
                  <!-- /.modal-dialog -->
          </form> 
          
        </div>
          <!-- Modal Disponibilidad -->



          <!-- Modal Eliminar -->
          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <h4 class="modal-title custom_align" id="Heading">Eliminar Registro</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Estás seguro de eliminar este registro?</div> 
                </div>
                <div class="modal-footer ">
                      <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
              </div>
            <!-- /.modal-content --> 
            </div>
          <!-- /.modal-dialog --> 
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
    
  </body>

</html>
