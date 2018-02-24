<?php @session_start(); ?>
<style>
		body {
			/*padding-top: 56px;*/
			/*padding-bottom: 56px;*/
		}
		@media screen and (max-width:576px){
			.container {
				width: 100%;
			}
		}
	</style>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary-b fixed-top">	
		<div class="container">
		
				
			<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu" aria-controls="fm-menu" aria-expanded="false" aria-label="Menu">
				<span class="navbar-toggler-icon"></span>
			</button>
				
				
					<a href="home.php" class="navbar-brand"> <img src="<?php echo $_SESSION['student_photo']; ?>" alt="" class="mifotoperfil"><?php echo $_SESSION['student_name']; ?></a>
			<!-- <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu" aria-controls="fm-menu" aria-expanded="false" aria-label="Menu">
				<span class="navbar-toggler-icon"></span>
			</button> -->

			
		
			
			
			
			
			<div class="collapse navbar-collapse justify-content-end" id="fm-menu">
				<form class="form-inline" action="home.php" method="get">
					
						
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<?php if(isset($_GET['search'])){?>
						<input class="form-control" type="searh" placeholder="Buscar" name="search" id="inlineFormInputGroup" value="<?php echo $_GET['search'] ?>"><div class="input-group-addon"><span class="icon-search"></span></div>
							<?php }else{ ?>
							<input class="buscador" type="searh" placeholder="Buscar" name="search" id="inlineFormInputGroup"><!-- <div class="input-group-addon"><span class="icon-search"></span></div> -->
							<?php } ?>
						</div>
    				
    				<button class="btn" hidden="" type="submit">Buscar</button>
  				</form>

				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="addsummer.php" class="nav-link" id="menu-categorias" ><span class="icon-plus"></span> Crear verano</a>
					</li>
					<li class="nav-item">
						<a href="miperfil.php" class="nav-link" id="menu-categorias" ><span class="icon-cog"></span> Mi perfil</a>
					</li>					
					<li class="nav-item">
						<a href="salir.php" class="nav-link" id="menu-categorias" title="Salir" ><span class="icon-exit"></span> Salir</a>
					</li>	
				</ul>
			</div>
		</div>
	</nav>
	<br><br>
	
	