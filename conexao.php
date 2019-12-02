<?php
	$servidor = "vcontrol.database.windows.net";
	$usuario = "MaestroBruno";
	$senha = "Master12457";
	$dbname = "Vcontrol";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	
?>