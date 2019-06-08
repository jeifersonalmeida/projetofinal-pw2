<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelProject.php';
class ProjectDAO {
	/*Como o PHP tem inferência de tipo, esse método, assim como outros, poderia ser mais "simples", porém estou fazendo de uma maneira que acho mais didático*/
	function getAllProjects(){	

		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM projeto");		
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo depionário
		$projects;		
		
		foreach ($linhas as $value) {
			//print_r($value);
			$project = new ModelProject();
			$project->setProjectFromDataBase($value);			
			$projects[]=$project;
		}	
		return $projects;		
	}
	//Retorna 1 se conseguiu inserir;
	function setProject($proj){			

		try {
			//monto a query
            $sql = "INSERT INTO projeto (		
                idProjeto,
                nome, departamento) 
                VALUES (
                :idProjeto,
                :nome,
				:dep)"
        	;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":idProjeto", $proj->getId());
			$statement->bindValue(":nome", $proj->getName());
			$statement->bindValue(":dep", $proj->getDep());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Insertion to DataBase failed".$e->getMessage();
        }		
	}

	function getProjectByDepartment($id){
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM projeto WHERE departamento = :id");
		$statement->bindValue(":id", $id);	
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo depionário
		$projects;		
		
		foreach ($linhas as $value) {
			//print_r($value);
			$project = new ModelProject();
			$project->setProjectFromDataBase($value);			
			$projects[]=$project;
		}	
		return $projects;		
	}

	function getProjectById($id){
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM projeto WHERE idProjeto = :id");
		$statement->bindValue(":id", $id);	
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;
		
		$project = new ModelProject();
		$project->setProjectFromDataBase($linhas[0]);
		return $project;
	}
}