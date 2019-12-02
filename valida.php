<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['email_cad'])) && (isset($_POST['senha_cad']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['email_cad']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha_cad']);
		//$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM tbl_empresas WHERE email_empresa = '$usuario' && senha_empresa = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			//$_SESSION['id_empresa'] = $resultado['id'];
			//$_SESSION['nm_empresa'] = $resultado['nome'];
			//$_SESSION['email_empresa'] = $resultado['email'];
			//if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: consultar lote.html");
			//}
			else{
				header("Location:inicio.html#paralogin");
			}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location:inicio.html#paralogin");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location:inicio.html#paralogin");
	}
?>