<?php
class Trabajo
{
    private $dbh;
    private $n;
    
    public function __construct()
    {
        $this->dbh=new PDO('pgsql:host=localhost;port=5432;dbname=proyecto_v2', "postgres", "12345");
        $this->n=array();
    }
    public function get_datosD()
    {
        $sql="select * from maestro where isactive='Y';";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->n[]=$row;
		}
			return $this->n;
			$this->dbh=null;
    }
    public function get_datosM()
    {
        $sql="select * from materia where isactive='Y';";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->n[]=$row;
		}
			return $this->n;
			$this->dbh=null;
    }
    public function get_datosC()
    {
        $sql="select * from carrera where isactive='Y';";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->n[]=$row;
		}
			return $this->n;
			$this->dbh=null;
    }
    public function delete($id)
    {
        $sql="delete from noticias where id=?";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindParam(1,$id);
		$stmt->execute();
        $this->dbh=null;
        header("Location: index.php?m=1");
    }
    public function get_noticia_por_id($id)
    {
        $sql="select * from noticias where id= ? ;";

		$stmt=$this->dbh->prepare($sql);
		if ($stmt->execute( array($id) ))
		{
			while ($row = $stmt->fetch())
			{
				$this->n[]=$row;
			}
			return $this->n;
			$this->dbh=null;
		}
    }
    public function edit()
    {
        //print_r($_POST);
         if(empty($_POST["nom"]) or empty($_POST["texto"]))
       {
            header("Location: edit.php?m=1&id=".$_POST["id"]);
            exit;
       }
       $sql="update noticias
            set
            titulo=?,
            texto=?
            where
            id=?
            ";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindValue(1,$_POST["nom"], PDO::PARAM_STR);
		$stmt->bindValue(2,$_POST["texto"],PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST["id"],PDO::PARAM_STR);
	   $stmt->execute();
        $this->dbh=null;
        header("Location: edit.php?m=2&id=".$_POST["id"]);
    }
    public function add()
    {
       if(empty($_POST["name"]) or empty($_POST["lastname"]))
       {
            header("Location: docente.php?m=1");
            exit;
       }
       $sql="insert into maestro values (get_uuid(),'Y',?,?,?,?);";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindValue(1, $_POST["ident"], PDO::PARAM_STR);
        $stmt->bindValue(2,$_POST["name"],PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST["lastname"],PDO::PARAM_STR);
        $stmt->bindValue(4,$_POST["description"],PDO::PARAM_STR);
	   $stmt->execute();
        $this->dbh=null;
		header("Location: docente.php?m=2");
    }
    public function addM()
    {
       if(empty($_POST["name"]) or empty($_POST["lastname"]))
       {
            header("Location: materia.php?m=1");
            exit;
       }
       $sql="insert into materia values (get_uuid(),'Y',?,?,?);";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindValue(1, $_POST["ident"], PDO::PARAM_STR);
        $stmt->bindValue(2,$_POST["name"],PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST["description"],PDO::PARAM_STR);
	   $stmt->execute();
        $this->dbh=null;
		header("Location: materia.php?m=2");
    }
    public function addC()
    {
       if(empty($_POST["name"]) or empty($_POST["ident"]))
       {
            header("Location: carrera.php?m=1");
            exit;
       }
       $sql="insert into carrera values (get_uuid(),'Y',?,?,?);";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindValue(1, $_POST["ident"], PDO::PARAM_STR);
        $stmt->bindValue(2,$_POST["name"],PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST["description"],PDO::PARAM_STR);
	   $stmt->execute();
        $this->dbh=null;
		header("Location: carrera.php?m=2");
    }

}
?>