<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):
	$nome = clear($_POST['nome']);
	$email = clear($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "INSERT INTO tb_usuarios (nm_usuarios, em_usuarios, pw_usuarios) VALUES ('$nome', '$email', '$senha')";

	if(mysqli_query($connect, $sql)):
        header('Location: ../login.php');
    else:
        header('Location: ../index.php');
	endif;
endif;