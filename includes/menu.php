<nav class="navbar navbar-default menu">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><?php if (isset($_SESSION["nomeLogado"])) echo strtoupper($_SESSION["nomeLogado"]) ?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <?php
              if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                echo '<li class="cadastrarFuncionario"><a href="cadastraFuncionario">Register Employee</a></li>';
              }
              echo '<li class="visualizarFuncionario"><a href="exibeFuncionarios">Show Employees</a></li>';
              if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                echo '<li class="cadastrarDepartamento"><a href="cadastrarDepartamento">Register Department</a></li>';
              }
              echo '<li class="visualizarDepartamento"><a href="visualizarDepartamento">Show Departments</a></li>';
              if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                echo '<li class="cadastrarProjeto"><a href="cadastrarProjeto">Register Project</a></li>';
              }
              echo '<li class="visualizarProjeto"><a href="visualizarProjeto">Show Projects</a></li>';
              if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'])
                echo '<li class="assignProject"><a href="assignProject">Assign Project</a></li>';
            ?>
              <li class=""><a href="login">Logout</a></li>              
            </ul>            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>