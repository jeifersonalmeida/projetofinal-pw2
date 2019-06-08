<?php

include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelDepartment.php';

class Func_ProjDAO {

    public function getProj($empId){
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
        
        $statement = $conn->prepare("SELECT * FROM funcionario_projeto WHERE Funcionario = :id");
        $statement->bindValue(":id", $empId);
        $statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
                return null;
                
        
        return $linhas;	
    }

	public function setRel($empId, $projId){
		try {
			//monto a query
            $sql = "INSERT INTO wp2.funcionario_projeto
                VALUES (
                :idFunc,
                :idProj)";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":idFunc", $empId);
            $statement->bindValue(":idProj", $projId);
            
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Failed to insert into database.".$e->getMessage();
        }
    }
    public function rmvRel($empId, $projId){
		try {
			//monto a query
            $sql = "DELETE FROM wp2.funcionario_projeto
                WHERE Funcionario = :idFunc AND Projeto = :idProj;";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":idFunc", $empId);
            $statement->bindValue(":idProj", $projId);
            
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Failed to insert into database.".$e->getMessage();
        }
	}
	
}