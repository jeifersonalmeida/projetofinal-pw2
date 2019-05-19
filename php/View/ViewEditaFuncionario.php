<?php
$titulo="Editar Funcionario";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Edit Employee: <?php echo $funcionario->getLogin(); ?></h1>
			<form action="postEditaFuncionario" method="POST">
				<div class="row">
					<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							else{
								echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							}
						} ?>
					<div class="col-md-6">
						<input name="login" value="<?php echo $funcionario->getLogin(); ?>" class="hidden">
            <div class="form-group">
							<label for="nome">Name:<span class="requerido">*</span></label>
							<input type="text" name="nome" class="form-control" id="nome" value="<?php echo $funcionario->getNome(); ?>">
						</div>
						<div class="form-group">
							<label for="pwd">Password:<span class="requerido">*</span></label>
							<input type="password" name="senha" class="form-control" id="pwd" required>
						</div>
						
					</div>

					<div class="col-md-6">							
						<div class="form-group">
							<label for="salario">Salary:<span class="requerido">*</span></label>
							<input type="text" name="salario" class="form-control" id="salario" value="<?php echo $funcionario->getSalario(); ?>">
						</div>
            <div class="form-group">
              <label for="department">Department</label>
              <select id="department" name="department" class="form-control">
                <?php
                  foreach($departments as $value) {
										if($value->getId() == $funcionario->getIdDepartamento())
											echo '<option value="'.$value->getId().'" selected="selected">'.$value->getName().'</option>';
										else
                    	echo '<option value="'.$value->getId().'">'.$value->getName().'</option>';
                  }
                ?>
              </select>
            </div>						
					</div>
					<div class="col-md-12">
						
					</div>
					<div class="col-md-6" style="margin-top: 10px;">
						<label><input type="checkbox" name="isAdmin" value="1"> Admin</label>
					</div>
			  	</div>
			  <button type="submit" class="btn btn-default center-block">Register</button>
			</form>
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
        $('.cadastrarFuncionario').addClass('active');
    });
</script>