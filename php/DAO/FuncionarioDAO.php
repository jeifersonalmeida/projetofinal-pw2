<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelFuncionario.php';
class FuncionarioDAO {
	function getFuncionario($login) {
		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$sql = "SELECT * FROM funcionario WHERE login = :login LIMIT 1";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':login', $login);		
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();

		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo funcionário
		$funcionarios;		

		foreach ($linhas as $value) {
			$funcionario = new ModelFuncionario();
			$funcionario->setFuncionarioFromDataBase($value);			
			$funcionarios[]=$funcionario;
		}	
		return $funcionarios[0];	
	}
	/*Como o PHP tem inferência de tipo, esse método, assim como outros, poderia ser mais "simples", porém estou fazendo de uma maneira que acho mais didático*/
	function getAllFuncionarios(){	

		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$sql = "SELECT * FROM funcionario";
		$statement = $conn->prepare($sql);		
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo funcionário
		$funcionarios;		
		
		foreach ($linhas as $value) {
			$funcionario = new ModelFuncionario();
			$funcionario->setFuncionarioFromDataBase($value);			
			$funcionarios[]=$funcionario;
		}	
		return $funcionarios;		
	}
	//Retorna 1 se conseguiu inserir;
	function setFuncionario($func){			

		try {
			//monto a query
            $sql = "INSERT INTO funcionario (		
                idFuncionario,
                nome,
                salario,
                login,
                senha,
                idPermissao,
                idDepartamento) 
                VALUES (
                :idFuncionario,
                :nome,
                :salario,
                :login,
                :senha,
                :idPermissao,
                :idDepartamento)";

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":idFuncionario", $func->getIdFuncionario());
            $statement->bindValue(":nome", $func->getNome());
            $statement->bindValue(":salario", $func->getSalario());
            $statement->bindValue(":login", $func->getLogin());
            $statement->bindValue(":senha", $func->getSenha());
            $statement->bindValue(":idPermissao", $func->getIdPermissao());
            $statement->bindValue(":idDepartamento", $func->getIdDepartamento());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }		
	}

	function updateFuncionario($func) {
		try {
			$sql = "UPDATE funcionario SET
				nome = :nome, 
				salario = :salario, 
				senha = :senha, 
				idPermissao = :idPermissao,
				idDepartamento = :idDepartamento
				WHERE idFuncionario = :idFuncionario;";
				
			$sql = "UPDATE funcionario SET";

			$multiples = false;

			if($func->getNome() !== null) {
				if($multiples)
					$sql .= ",";
				$sql .= " nome = :nome";
				$multiples = true;
			}
			if($func->getSalario() !== null) {
				if($multiples)
					$sql .= ",";
				$sql .= " salario = :salario";
				$multiples = true;
			}
			if($func->getSenha() !== null) {
				if($multiples)
					$sql .= ",";
				$sql .= " senha = :senha";
				$multiples = true;
			}
			if($func->getIdPermissao() !== null) {
				if($multiples)
					$sql .= ",";
				$sql .= " idPermissao = :idPermissao";
				$multiples = true;
			}
			if($func->getIdDepartamento() !== null) {
				if($multiples)
					$sql .= ",";
				$sql .= " idDepartamento = :idDepartamento";
				$multiples = true;
			}

			$sql .= " WHERE login = :login";

			//pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

			if($func->getNome() !== null)
				$statement->bindValue(":nome", $func->getNome());
			if($func->getSalario() !== null)
				$statement->bindValue(":salario", $func->getSalario());
			if($func->getSenha() !== null)
				$statement->bindValue(":senha", $func->getSenha());
			if($func->getIdPermissao() !== null)
				$statement->bindValue(":idPermissao", $func->getIdPermissao());
			if($func->getIdDepartamento() !== null)
				$statement->bindValue(":idDepartamento", $func->getIdDepartamento());

			$statement->bindValue(":login", $func->getLogin());

			return $statement->execute();
		} catch (PDOException $e) {
			echo "Erro ao atualizar na base de dados.".$e->getMessage();
		}
	}

	function disableFuncionario($func) {
		try {
			$sql = "UPDATE funcionario SET active = 0 WHERE login = :login";

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

			$statement->bindValue(":login", $func->getLogin());

			return $statement->execute();

		} catch (PDOException $e) {
				echo "Erro ao inserir na base de dados.".$e->getMessage();
		}	
	}

}