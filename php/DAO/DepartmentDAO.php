<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelDepartment.php';
class DepartmentDAO {
	/*Como o PHP tem inferência de tipo, esse método, assim como outros, poderia ser mais "simples", porém estou fazendo de uma maneira que acho mais didático*/
	function getAllDepartments(){	

		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM departamento");		
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo depionário
		$departments;		
		
		foreach ($linhas as $value) {
			//print_r($value);
			$department = new ModelDepartment();
			$department->setDepartmentFromDataBase($value);			
			$departments[]=$department;
		}	
		return $departments;		
	}
	//Retorna 1 se conseguiu inserir;
	function setDepartment($dep){			

		try {
			//monto a query
            $sql = "INSERT INTO departamento (		
                idDepartamento,
                nome) 
                VALUES (
                :idDepartamento,
                :nome)"
        	;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":idDepartamento", $dep->getId());
            $statement->bindValue(":nome", $dep->getName());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Insertion to DataBase failed".$e->getMessage();
        }		
	}

	function getDepartmentById($id){
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM departamento WHERE idDepartamento = :id");
		$statement->bindValue(":id", $id);		
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		$department = new ModelDepartment();
		$department->setDepartmentFromDataBase($linhas[0]);	

		return $department;		
	}
	
}