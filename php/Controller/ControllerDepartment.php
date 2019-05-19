<?php

include_once $_SESSION["root"].'php/DAO/DepartmentDAO.php';
include_once $_SESSION["root"].'php/Model/ModelDepartment.php';

class ControllerDepartment {
	function getAllDepartments(){
		$depDAO = new DepartmentDAO();
		$departments=$depDAO->getAllDepartments();
		usort($departments, function ($a, $b){
			if($a->getName() > $b->getName())
						return $_SESSION["sortDep"];
			else if($a->getName() < $b->getName())
				return $_SESSION["sortDep"]*-1;
			return 0;
		});
		$_SESSION["sortDep"] *= -1;

		include_once $_SESSION["root"].'php/View/ViewShowDepartment.php';
    }
    
	function setDepartment(){
		$depDAO = new DepartmentDAO();
		$department = new ModelDepartment();
		$department->setDepartmentFromPOST();
		$resultadoInsercao = $depDAO->setDepartment($department);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Registration successful";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="Error: " . $resultadoInsercao;
			$_SESSION["flash"]["sucesso"]=false;
			//Var temp de feedback	
			$_SESSION["flash"]["nome"]=$department->getName();
			
		}
		include_once $_SESSION["root"].'php/View/ViewRegisterDepartment.php';
	}
}