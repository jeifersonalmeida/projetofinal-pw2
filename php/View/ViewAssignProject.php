<?php
$titulo="Assign Project";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Assign Project</h1>
			<form action="actionProject" method="POST">
				<div class="row">
					<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							else{
								echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							}
						} ?>
					<div class="col-md-6">
						<div class="form-group">
							<label for="emp">Employee:<span class="requerido">*</span></label>
							
							<select name="emp" class="form-control">
							<?php
							foreach($employees as $emp){
								echo "<option value='".$emp->getidFuncionario()."'>".$emp->getNome()."</option>";
								
							}
							?>						
							</select>

						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="proj">Project:<span class="requerido">*</span></label>
							<!-- <?php print_r($employees); ?> -->
							<select name="proj" class="form-control">
							<?php
							foreach($projects as $proj){
								echo "<option value='".$proj->getId()."'>".$proj->getName()."</option>";
								
							}
							?>		
							</select>
						</div>	
					</div>
			  	</div>
			<div>
			<button type="submit" name='action' value='assign' class="btn btn-default center-block">Assign</button>
			<button type="submit" name='action' value='deassign' class="btn btn-default center-block">Deassign</button>			
			</div>
			  
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
        $('.assignProject').addClass('active');
    });
</script>