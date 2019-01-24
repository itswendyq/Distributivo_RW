<?php
$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtName=(isset($_POST['txtName']))?$_POST['txtName']:"";
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
  
    $sentencia=$dbh->prepare("insert into carrera 
    values (get_uuid(),'Y',:Ident,:Name,:Description);");

    $sentencia->bindParam(':Ident',$txtIdent);
    $sentencia->bindParam(':Name',$txtName);  
    $sentencia->bindParam(':Description',$txtDescription);
    $sentencia->execute();
  
    header('Location: carrera.php');
  break;
  case 'btnModificar':

    $sentencia=$dbh->prepare("update carrera
    set
    isactive= default,
    identificador=:Ident,
    nombre=:Name,
    description=:Description
    where
    id_carrera=:Id
    ;");

    $sentencia->bindParam(':Ident',$txtIdent);
    $sentencia->bindParam(':Name',$txtName);    
    $sentencia->bindParam(':Description',$txtDescription);
    $sentencia->bindParam(':Id',$txtId);
    $sentencia->execute();

    header('Location: carrera.php');
    
  break;
  case 'btnEliminar':

    $sentencia=$dbh->prepare("update carrera
    set
    isactive= 'N'    
    where
    id_carrera=:Id
    ;");

    $sentencia->bindParam(':Id',$txtId);
    $sentencia->execute();

    header('Location: carrera.php');
    break;
  case "Seleccionar":
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar="";
      $mostrarModal= true;

      $sentencia=$dbh->prepare("select * from carrera where id_carrera =:Id ");

      $sentencia->bindParam(':Id',$txtId);
      $sentencia->execute();
      $carreras=$sentencia->fetch(PDO::FETCH_LAZY);

      $txtName=$carreras['nombre'];
      $txtIdent=$carreras['identificador'];
      $txtDescription=$carreras['description'];
      

  break;
}

  $sentencia=$dbh->prepare("select * from carrera where isactive='Y' ");
  $sentencia->execute();
  $listarCarreras=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //print_r($listarCarreras);

?>