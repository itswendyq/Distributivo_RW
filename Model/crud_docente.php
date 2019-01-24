<?php
$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtName=(isset($_POST['txtName']))?$_POST['txtName']:"";
$txtLastname=(isset($_POST['txtLastname']))?$_POST['txtLastname']:"";
$txtIdent=(isset($_POST['txtIdent']))?$_POST['txtIdent']:"";
$txtDescription=(isset($_POST['txtDescription']))?$_POST['txtDescription']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar="disabled";
$mostrarModal=false;

include ('../Controller/conexion.php');

switch($accion){
  case 'btnAgregar':
  
    if($txtName==""){
      $error['nombre']="Escribe el nombre";
    }
    

    $sentencia=$dbh->prepare("insert into maestro 
    values (get_uuid(),'Y',:Ident,:Name,:Lastname,:Description);");

    $sentencia->bindParam(':Ident',$txtIdent);
    $sentencia->bindParam(':Name',$txtName);
    $sentencia->bindParam(':Lastname',$txtLastname);    
    $sentencia->bindParam(':Description',$txtDescription);
    $sentencia->execute();
  
    header('Location: docente.php');
  break;
  case 'btnModificar':

    $sentencia=$dbh->prepare("update maestro
    set
    isactive= default,
    identificador=:Ident,
    nombre=:Name,
    apellido=:Lastname,
    description=:Description
    where
    id_maestro=:Id
    ;");

    $sentencia->bindParam(':Ident',$txtIdent);
    $sentencia->bindParam(':Name',$txtName);
    $sentencia->bindParam(':Lastname',$txtLastname);    
    $sentencia->bindParam(':Description',$txtDescription);
    $sentencia->bindParam(':Id',$txtId);
    $sentencia->execute();

    header('Location: docente.php');
    
  break;
  case 'btnEliminar':

    $sentencia=$dbh->prepare("update maestro
    set
    isactive= 'N'    
    where
    id_maestro=:Id
    ;");

    $sentencia->bindParam(':Id',$txtId);
    $sentencia->execute();

    header('Location: docente.php');
    break;
  case "Seleccionar":
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar="";
      $mostrarModal= true;

      $sentencia=$dbh->prepare("select * from maestro where id_maestro =:Id ");

      $sentencia->bindParam(':Id',$txtId);
      $sentencia->execute();
      $maestros=$sentencia->fetch(PDO::FETCH_LAZY);

      $txtName=$maestros['nombre'];
      $txtLastname=$maestros['apellido'];
      $txtIdent=$maestros['identificador'];
      $txtDescription=$maestros['description'];
      

  break;
}

  $sentencia=$dbh->prepare("select * from maestro where isactive='Y' ");
  $sentencia->execute();
  $listarMaestros=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //print_r($listarMaestros);

?>