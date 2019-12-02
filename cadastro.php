<?php
include_once("conexao.php");
$login = $_POST['email_cad'];
$nome = $_POST['nome_cad'];
$senha = MD5($_POST['senha_cad']);

$query_select = "SELECT tbl_empresas FROM  WHERE email_empresa = '$login'";

$select = mysql_query($query_select,$conn);

$array = mysql_fetch_array($select);

$logarray = $array['email_cad'];

 

  if($login == “” || $login == null){

    echo”<script language=’javascript’ type=’text/javascript’>alert(‘O campo login deve ser preenchido’);window.location.href=’inicio.html#paracadastro’;</script>”;

    }else{

      if($logarray == $login){

        echo”<script language=’javascript’ type=’text/javascript’>alert(‘Esse login já existe’);window.location.href=’inicio.html#paracadastro’;</script>”;

        die();

 

      }else{

        $query = “INSERT INTO tbl_empresas(email_empresa,nm_empresa,senha_empresa)
        VALUES ($login,$nome,$senha )”;

        $insert = mysql_query($query,$conn);

        if($insert){

          echo”<script language=’javascript’ type=’text/javascript’>alert(‘Usuário cadastrado com sucesso!’);window.location.href= 'inicio.html#paralogin'</script>”;

        }else{

          echo”<script language=’javascript’ type=’text/javascript’>alert(‘Não foi possível cadastrar esse usuário’);window.location.href=’inicio.html#paracadastro'</script>”;

        }

      }

    }

?>