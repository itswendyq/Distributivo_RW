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
        $sql="select * from maestro where isactive='Y'; ;";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->n[]=$row;
		}
			return $this->n;
			$this->dbh=null;
    }
     public function get_dato_por_id( $id )
    {
        $sql="select * from maestro where id_maestro= ? ;";

		$stmt=$this->dbh->prepare($sql);
		if ($stmt->execute(array($id)))
		{
			while ($row = $stmt->fetch())
			{
				$this->n[]=$row;
			}
			return $this->n;
			$this->dbh=null;
		}
    }
    public function editD()
    {
        print_r($_POST);
         if(empty($_POST["name"]) or empty($_POST["lastname"]))
       {
            header("Location: docente_edit.php?n=1&id=".$_POST["id"]);
            exit;
       }
       $sql="update maestro
            set
            isactive= default,
            identificador=?,
            nombre=?
            apellido=?,
            description=?
            where
            id_maestro=?
            ";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindValue(1,$_POST["ident"], PDO::PARAM_STR);
		$stmt->bindValue(2,$_POST["name"],PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST["lastname"],PDO::PARAM_STR);
        $stmt->bindValue(4,$_POST["description"],PDO::PARAM_STR);
        $stmt->bindValue(5,$_POST["id"],PDO::PARAM_STR);
        $stmt->execute();
        $this->dbh=null;
        header("Location: docente_edit.php?n=2&id=".$_POST["id"]);
    }
}

?>
