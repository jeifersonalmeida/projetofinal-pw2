<?php
$titulo="Exibir Funcionários";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Employees</h1>
			<table class="table table-striped" style='text-align:center'>
			<?php 
				//$funcionarios foi criado no controller que chamou essa classe;
				echo "<tr>";
					echo "<th style='text-align:center'><a href='sortByName'>Name</a></th>";
					echo "<th style='text-align:center'><a href='sortBySalary'>Salary</a></th>";
					echo "<th style='text-align:center'><a href='sortByLogin'>Login</a></th>";
					echo "<th style='text-align:center'>Projects</th>";
					echo "<th colspan='2'></th>";
				echo "</tr>";
				foreach ($funcionarios as $value) {
					if($value->getActive() == 0)
						continue;
					echo 
						"<tr>";
						echo 
							"<td>".$value->getNome()."</td>";
						echo 
							"<td>".$value->getSalario()."</td>";
						echo 
							"<td>".$value->getLogin()."</td>";
						echo 
							"<td>";
						$projects=$Func_ProjDAO->getProj($value->getIdFuncionario());
						if($projects != null)
							foreach($projects as $p){
								$proj = $ProjDAO->getProjectById($p["Projeto"]);
								echo $proj->getName()."; ";
							}
						else{
							echo "";
						}
						echo "</td>";
						echo 
							"<td>
								<form action='edit' method='POST'>
									<input name='login' value='" .$value->getLogin() ."' class='hidden'>
									<input type='submit' value='Edit' class='form-control' style='width: 50px;'>
								</form>
							</td>";
						echo 
							"<td>
								<form action='disable' method='POST'>
									<input name='login' value='" .$value->getLogin() ."' class='hidden'>
									<input type='submit' value='Remove' class='form-control' style='width: 70px;'>
								</form>
							</td>";
					echo 
						"</tr>";
				}
			?>
			</table>
		</div>
	</div>	
</body>
<!-- add no footer -->
<?php 
	include $_SESSION["root"].'includes/footer.php';
	if(isset($_SESSION["flash"])){
		foreach ($_SESSION["flash"] as $key => $value) {
			unset($_SESSION["flash"][$key]);	
		}
	}?>
<!-- fim footer -->
<script>		
	$(document).ready(function () {
        $('.visualizarFuncionario').addClass('active');
    });
</script>