<?php

try {
    $dbh=new PDO('pgsql:host=localhost;port=5432;dbname=proyecto_v4', "postgres", "12345");
	
}
catch(PDOException $e)
{
    echo  $e->getMessage();
}

 