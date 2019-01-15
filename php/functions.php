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
    //------------ Registros de la Base ---------------
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

        public function get_datosC()
        {
            $sql="select * from carrera ;";
            foreach ($this->dbh->query($sql) as $row)
            {
                $this->n[]=$row;
            }
                return $this->n;
                $this->dbh=null;
        }

        public function get_datosM()
        {
            $sql="select * from materia;";
            foreach ($this->dbh->query($sql) as $row)
            {
                $this->n[]=$row;
            }
                return $this->n;
                $this->dbh=null;
        }
    //------------ Eliminar registro ---------------
        public function delete($id)
        {
            $sql="delete from noticias where id=?";
            $stmt=$this->dbh->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $this->dbh=null;
            header("Location: index.php?m=1");
        }
    //------------- Buscar registro -------------------
    public function get_dato_por_id($id)
    {
        $sql="select * from maestro where id_maestro= ? ;";

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
    
         if(empty($_POST["nombre"] or empty($_POST["apellido"] or empty($_POST["nombre_empresa"] or empty($_POST["direccion"] or empty($_POST["telefono_empresa"] or empty($_POST["nombre_usuario"] or empty($_POST["password"] ))))))))
       {
            header("Location: docente.1.php?m=1&id=".$_POST["id"]);
            exit;
       }
       
       $sql="update maestro
        set 
        identificador=?, nombre=?, apellido=?, description=?
        where
        id_maestro=? 
        ";
		$stmt=$this->dbh->prepare($sql);
        $stmt->bindValue(1,$_POST["ident"], PDO::PARAM_STR);
        $stmt->bindValue(2,$_POST["name"], PDO::PARAM_STR);
        $stmt->bindValue(3,$_POST["lastname"], PDO::PARAM_STR);
        $stmt->bindValue(4,$_POST["description"], PDO::PARAM_STR);
        $stmt->bindValue(5,$_POST["id"], PDO::PARAM_INT);
        $stmt->execute();
        $this->dbh=null;
        header("Location: docente.php");
    }
    //------------ Editar registros ---------------
        public function editd()
        {
            //print_r($_POST);
            if(empty($_POST["name"]) && empty($_POST["lastname"])&& empty($_POST["ident"])&&empty($_POST["description"]))
        {
                header("Location: docente.php?n=1&id=".$_POST["id"]);
                exit;
        }
        $sql="update maestro set get_uuid(),default, =?, =?, =?,=?  where id_maestro=?";

            $stmt=$this->dbh->prepare($sql);
            $stmt->bindValue(1,$_POST["ident"], PDO::PARAM_STR);
            $stmt->bindValue(2,$_POST["name"], PDO::PARAM_STR);
            $stmt->bindValue(3,$_POST["lastname"],PDO::PARAM_STR);            
            $stmt->bindValue(4,$_POST["description"],PDO::PARAM_STR);
            $stmt->bindValue(5,$_POST["id_maestro"],PDO::PARAM_STR);
        $stmt->execute();
            $this->dbh=null;
            header("Location: docente.php?n=2&id=".$_POST["id"]);
        }
    //------------- Crear nuevos registros ----------
        public function add()
        {
            if(empty($_POST["name"]) && empty($_POST["lastname"])&& empty($_POST["ident"])&&empty($_POST["description"]))
            {
                 header("Location: docente.php?m=1");
                 exit;
            }
        $sql="insert into maestro values (get_uuid(),default, ?, ?, ?, ?);";
            $stmt=$this->dbh->prepare($sql);
            $stmt->bindValue(1,$_POST["ident"], PDO::PARAM_STR);
            $stmt->bindValue(2,$_POST["name"], PDO::PARAM_STR);
            $stmt->bindValue(3,$_POST["lastname"],PDO::PARAM_STR);            
            $stmt->bindValue(4,$_POST["description"],PDO::PARAM_STR);
            $stmt->execute();
            $this->dbh=null;
            header("Location: docente.php?m=2");
    
        }

        public function addC()
        {
            if(empty($_POST["name"]) && empty($_POST["ident"])&&empty($_POST["description"]))
            {
                 header("Location: carrera.php?m=1");
                 exit;
            }
        $sql="insert into carrera values (get_uuid(),default, ?, ?, ?);";
            $stmt=$this->dbh->prepare($sql);
            $stmt->bindValue(1, $_POST["ident"], PDO::PARAM_STR);
            $stmt->bindValue(2, $_POST["name"], PDO::PARAM_STR);         
            $stmt->bindValue(3,$_POST["description"],PDO::PARAM_STR);
            $stmt->execute();
            $this->dbh=null;
            header("Location: carrera.php?m=2");
    
        }

        public function addM()
        {
            if(empty($_POST["name"]) && empty($_POST["ident"])&&empty($_POST["description"]))
            {
                 header("Location: materia.php?m=1");
                 exit;
            }
        $sql="insert into materia values (get_uuid(),default, ?, ?, ?);";
            $stmt=$this->dbh->prepare($sql);
            $stmt->bindValue(1, $_POST["ident"], PDO::PARAM_STR);
            $stmt->bindValue(2, $_POST["name"], PDO::PARAM_STR);         
            $stmt->bindValue(3,$_POST["description"],PDO::PARAM_STR);
            $stmt->execute();
            $this->dbh=null;
            header("Location: materia.php?m=2");
    
        }
           
    }
    
?>