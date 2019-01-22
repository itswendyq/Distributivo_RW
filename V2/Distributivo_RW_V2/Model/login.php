<?php
if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){

			if($_POST["username"]==$_POST["password"]){

				print "<script>window.location='../View/index.html';</script>";				

			}else{
				print "<script>alert(\"Acceso invalido.\");window.location='../View/login.html';</script>";
			}
		}
	}
}


?>