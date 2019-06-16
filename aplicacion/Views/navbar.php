<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" role="navigation">
		<a class="navbar-brand" href="<?php echo constant('URL'); ?>main"><img src="./assets/logo.png" alt="logo Kenko nutrición" width="55" height="55"></a>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
       	<span class="navbar-toggler-icon"></span>
      	</button>	
	  	<div class="collapse navbar-collapse" id="exCollapsingNavbar">
        <ul class="navbar-nav mr-auto">
        	<li class="nav-item active">
            	<a class="nav-link" href="<?php echo constant('URL'); ?>main">Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
	        	<a class="nav-link" href="<?php echo constant('URL'); ?>category">Categorias</a>
	        </li>
	        <li class="nav-item">
	        	<a class="nav-link" href="<?php echo constant('URL'); ?>food">Alimentos</a>
	        </li>
			<li class="nav-item">
	        	<a class="nav-link" href="<?php echo constant('URL'); ?>calculator">Calculadora</a>
	        </li>
          	<li class="nav-item dropdown">
            	<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más recursos</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown04">
				  <a class="dropdown-item" href="<?php echo constant('URL'); ?>recipe">Recetas</a>
				  <a class="dropdown-item" href="<?php echo constant('URL'); ?>contact">Contacta con nosotros</a>
	            </div>
          	</li> 
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <li class="nav-item order-2 order-md-1"><a href="<?php echo constant('URL'); ?>register" class="nav-link" title="settings"><i class="fas fa-sign-in-alt"></i> Sign up </a></li>
			<li class="nav-item order-1 order-md-1"><a href="<?php echo constant('URL'); ?>login" class="nav-link" title="login"><i class="fa fa-user"> </i> Login </a></li>
            <!--<li class="dropdown order-1"> 
	            <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"><i class="fa fa-user"></i><a href="form-login.php"> Login</a> <span class="caret"></span></button>
	             <ul class="dropdown-menu dropdown-menu-right mt-2">
	                <li class="px-3 py-2">
	                    <form class="form" action="login.php" role="form" method="POST">
	                    	<div class="form-group">
	                        <input id="UsuarioInput" placeholder="Usuario" class="form-control form-control-sm" type="text" name="usu" required>
	                        </div>
	                        <div class="form-group">
	                        <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" name="pass" required>
	                        </div>
	                        <div class="form-group">
	                        <button type="submit" class="btn  btn-block">Login</button>
	                        </div>
	                        <div class="form-group text-center">
	                            <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
	                        </div>
	                    </form>
	                    </li>
	            </ul> 
            </li> -->
        </ul>
        </div>
	</nav>
				<!-- Si has olvidado la contraseña -->
	<!-- <div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <h3>¿Has olvidado la contraseña?</h3>
		        <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
		    </div>
		    <div class="modal-body"> -->
		    	<!-- TODO:  RESTAURAR LA CONTRASEÑA- FALTA IMPLEMENTAR   -->
		    <!--<input placeholder="Restaura tu contraseña..." type="password" required>
		    </div>
		    <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Guardar los cambios</button>
		    </div>
	    </div>
	    </div>
	</div> -->
<!--  -------TERMINA EL NAV--------  -->