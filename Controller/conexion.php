<?php
class Database {
	private $dbh;
	private $n;

	public function __construct()
 	{
	 $this->dbh=new PDO('pgsql:host=localhost;port=5432;dbname=proyecto_v2', "postgres", "12345");
	 $this->n=array();
 	}
}
 