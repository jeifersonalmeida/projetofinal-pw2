<?php
$titulo="Show Department";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Departments</h1>
			<table style="text-align:center" class="table table-striped">
			<?php 
				//$funcionarios foi criado no controller que chamou essa classe;
				echo "<tr>";
					echo "<th style='text-align:center'><a href='sort'>Name</a></th>";
					// echo "<th>Salary</th>";
					// echo "<th>Login</th>";
				echo "</tr>";
				foreach ($departments as $value) {
					echo "<tr>";
						echo "<td>".$value->getName()."</td>";
						// echo "<td>".$value->getSalario()."</td>";
						// echo "<td>".$value->getLogin()."</td>";
					echo "</tr>";
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
        $('.visualizarDepartamento').addClass('active');
    });
</script>