<?php

include_once $_SESSION["root"].'php/DAO/FuncionarioDAO.php';
include_once $_SESSION["root"].'php/DAO/Func_ProjDAO.php';
include_once $_SESSION["root"].'php/Model/ModelFuncionario.php';

class ControllerFuncionario {
	function getAllFuncionarios(){
		$funcDAO = new FuncionarioDAO();
		$funcionarios=$funcDAO->getAllFuncionarios();
		$Func_ProjDAO = new Func_ProjDAO();
		$ProjDAO = new ProjectDAO();

		if(isset($_SESSION["sort"]))
			usort($funcionarios, function ($a, $b){
				switch($_SESSION["sort"]){
					case "Salary":
						if($a->getSalario() > $b->getSalario()){
							return $_SESSION["orderSalary"];
						}
						else if($a->getSalario() < $b->getSalario()){
							return $_SESSION["orderSalary"]*-1;
						}
						return 0;

					break;
					case "Login":
						if($a->getLogin() > $b->getLogin())
							return $_SESSION["orderLogin"];
						else if($a->getLogin() < $b->getLogin())
							return $_SESSION["orderLogin"]*-1;
						return 0;

					break;
					case "Name":
						if($a->getNome() > $b->getNome())
							return $_SESSION["orderName"];
						else if($a->getNome() < $b->getNome())
							return $_SESSION["orderName"]*-1;
						

						return 0;

					break;
				}
			});
			$_SESSION["orderName"] *= -1;
			$_SESSION["orderLogin"]*=-1;
			$_SESSION["orderSalary"]*=-1;
		include_once $_SESSION["root"].'php/View/ViewExibeFuncionarios.php';
	}
	function setFuncionario(){
		$funcDAO = new FuncionarioDAO();
		$funcionario = new ModelFuncionario();
		$funcionario->setFuncionarioFromPOST();
		$resultadoInsercao = $funcDAO->setFuncionario($funcionario);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Registration successful";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="Login already taken";
			$_SESSION["flash"]["sucesso"]=false;
			//Var temp de feedback	
			$_SESSION["flash"]["nome"]=$funcionario->getNome();
			$_SESSION["flash"]["login"]=$funcionario->getLogin();
			$_SESSION["flash"]["salario"]=$funcionario->getSalario();
		}
		include_once $_SESSION["root"].'php/View/ViewCadastraFuncionario.php';
	}
	function updateFuncionario() {
		$funcDAO = new FuncionarioDAO();
		$funcionario = new ModelFuncionario();
		$funcionario->setFuncionarioFromPOST();
		$resultadoInsercao = $funcDAO->updateFuncionario($funcionario);

		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Update successful";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="Update failed";
			$_SESSION["flash"]["sucesso"]=false;
		}
		include_once $_SESSION["root"].'php/View/ViewEditaFuncionario.php';
	}
}