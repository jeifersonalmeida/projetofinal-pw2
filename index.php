<?php
//Inicia a sessão
session_start();
if (!isset($_SESSION["sortDep"]))
	$_SESSION["sortDep"] = 1;

if (!isset($_SESSION["orderName"]))
	$_SESSION["orderName"] = 1;
if (!isset($_SESSION["orderSalary"]))
	$_SESSION["orderSalary"] = 1;
if (!isset($_SESSION["orderLogin"]))
	$_SESSION["orderLogin"] = 1;

//Add o caminho sistema a uma váriavel de sessão; descomentar o printr para entender melhor
/*if (!isset($_SESSION["root"])) {
	$_SESSION["root"] = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
}*/

$_SESSION["root"]="/opt/lampp/htdocs/projetofinal-pw2/";
//print_r($_SESSION["root"] );

//Chamo o arquivo responsável por gerenciar as rotas do sistema
include $_SESSION["root"].'routes.php';
?>