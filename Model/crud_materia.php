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
  
    if($txtName==""){
      $error['nombre']="Escribe el nombre";
    }
    

    $sentencia=$dbh->prepare("insert into materia 
    values (get_uuid(),'Y',:Ident,:Name,:Description);");

    $sentencia->bindParam(':Ident',$txtIdent);
    $sentencia->bindParam(':Name',$txtName);  
    $sentencia->bindParam(':Description',$txtDescription);
    $sentencia->execute();
  
    header('Location: materia.php');
  break;
  case 'btnModificar':

    $sentencia=$dbh->prepare("update materia
    set
    isactive= default,
    identificador=:Ident,
    nombre=:Name,
    description=:Description
    where
    id_materia=:Id
    ;");

    $sentencia->bindParam(':Ident',$txtIdent);
    $sentencia->bindParam(':Name',$txtName);    
    $sentencia->bindParam(':Description',$txtDescription);
    $sentencia->bindParam(':Id',$txtId);
    $sentencia->execute();

    header('Location: materia.php');
    
  break;
  case 'btnEliminar':

    $sentencia=$dbh->prepare("update materia
    set
    isactive= 'N'    
    where
    id_materia=:Id
    ;");

    $sentencia->bindParam(':Id',$txtId);
    $sentencia->execute();

    header('Location: materia.php');
    break;
  case "Seleccionar":
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar="";
      $mostrarModal= true;

      $sentencia=$dbh->prepare("select * from materia where id_materia =:Id ");

      $sentencia->bindParam(':Id',$txtId);
      $sentencia->execute();
      $materias=$sentencia->fetch(PDO::FETCH_LAZY);

      $txtName=$materias['nombre'];
      $txtIdent=$materias['identificador'];
      $txtDescription=$materias['description'];
      

  break;
}

  $sentencia=$dbh->prepare("select * from materia where isactive='Y' ");
  $sentencia->execute();
  $listarMaterias=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  //print_r($listarmaterias);

?>