<?php
$titulo="Register Department";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Register Department</h1>
			<form action="postCadastraDepartment" method="POST">
				<div class="row " >
					<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							else{
								echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							}
						} ?>
					<!-- <div class="col-md-6">
						<div class="form-group">
							<label for="email">Login:<span class="requerido">*</span></label>
							<input type="login" name="login" class="form-control" id="login" 
								value="<?php if(isset($_SESSION["flash"]["login"]))echo $_SESSION["flash"]["login"];?>">
						</div>
						<div class="form-group">
							<label for="pwd">Password:<span class="requerido">*</span></label>
							<input type="password" name="senha" class="form-control" id="pwd" value="">
						</div>
						
					</div> -->

					<!-- <div class="col-md-6 center-block" style="margin-left: auto; margin-right: auto;"> -->
						<div class="form-group">
							<label for="nome">Name:<span class="requerido">*</span></label>
							<input type="text" name="nome" class="form-control" id="nome" value="<?php if(isset($_SESSION["flash"]["nome"]))echo $_SESSION["flash"]["nome"];?>">
						</div>
						<!-- <div class="form-group">
							<label for="salario">Salary:<span class="requerido">*</span></label>
							<input type="text" name="salario" class="form-control" id="salario" value="<?php if(isset($_SESSION["flash"]["salario"]))echo $_SESSION["flash"]["salario"];?>">
						</div>						 -->
					<!-- </div> -->
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
        $('.cadastrarDepartamento').addClass('active');
    });
</script>