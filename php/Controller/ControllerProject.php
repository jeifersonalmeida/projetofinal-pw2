<?php

include_once $_SESSION["root"].'php/DAO/ProjectDAO.php';
include_once $_SESSION["root"].'php/Model/ModelProject.php';

class ControllerProject {
	function getAllProjects(){
		$projDAO = new ProjectDAO();
		$projects=$projDAO->getAllProjects();
		
		$depDAO = new DepartmentDAO();

		include_once $_SESSION["root"].'php/View/ViewShowProject.php';
    }
    
	function setProject(){
		$projDAO = new ProjectDAO();
		$project = new ModelProject();
		$project->setProjectFromPOST();
		$resultadoInsercao = $projDAO->setProject($project);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Registration successful";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="Error: " . $resultadoInsercao;
			$_SESSION["flash"]["sucesso"]=false;
			//Var temp de feedback	
			$_SESSION["flash"]["nome"]=$project->getName();
			$_SESSION["flash"]["dep"]=$project->getDep();
			
		}
		include_once $_SESSION["root"].'php/View/ViewRegisterProject.php';
	}

	
}