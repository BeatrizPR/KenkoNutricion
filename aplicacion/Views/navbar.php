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
            
        </ul>
        </div>
	</nav>
			
<!--  -------TERMINA EL NAV--------  -->