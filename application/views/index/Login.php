<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
        <link href="<?php echo base_url('css/bootstrap.css')?>" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('rut/jquery.Rut.js'); ?>"></script>
</head>
<body>
       
	<div class="container">
            
 <h1 class="text-center page-header">Portal Planificación Clase a Clase</h1>
		<div class="row">
		   <div id="myCarousel" class="carousel slide">
			    <div class="carousel-inner">
				   <div class="item active">
                                       <img src="<?php echo base_url('img/utem.jpg')?>" height="120" width="600" alt="">
					   <div class="carousel-caption">
					   	<h4>Titulo</h4>
					   	<p>Descripcion</p>
					   </div>
				   </div>
				   <div class="item">
					   <img src="<?php echo base_url('img/utem3.jpg')?>" height="120" width="600" alt="">
					   <div class="carousel-caption">
					   	<h4>Titulo</h4>
					   	<p>Descripcion</p>
					   </div>
				   </div>
				   <div class="item">
					   <img src="<?php echo base_url('img/utem2.jpg')?>" height="120" width="600" alt="">
					   <div class="carousel-caption">
					   	<h4>Titulo</h4>
					   	<p>Descripcion</p>
					   </div>
				   </div>
				   <div class="item">
					   <img src="<?php echo base_url('img/utem4.jpeg')?>" height="120" width="600" alt="">
					   <div class="carousel-caption">
					   	<h4>Titulo</h4>
					   	<p>Descripcion</p>
					   </div>
				   </div>
			   </div>
			   <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			   <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		   </div>
	    </div>

            <div class="text-center">
	<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Inicia sesion</a>
        </div>
	<div id="myModal" class="modal hide fade text-center">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
		  <h3>Portal UTEM</h3>	
		</div>
		<div class="modal-body">
			<for class="form-horizontal" role="form">
                              
				<div class="form-gruop control-gruop">
					<label for="inputUsuario" class=" control-label">Usuario</label>
					<div class="controls">
						<input type="text" id="inputUsuario" placeholder="Usuario">
					</div>
				</div>
				<h4></h4>
				<div>
				<div class="for-group control-group">
					<label for="inputPassword" class="control-label">Password</label>
					<div class="controls">
						<input type="password" id="inputPassword" placeholder="Password">
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox">Recordar la contraseña
							</label>
						</div>
					</div>
				</div>
				</div>
 
                   
			</for>
		</div>	
                                               <div class="text-error">
                                <br>

    </div>
		<div class="modal-footer">
			<a href="#" class="btn btn-inverse" data-dismiss="modal">Salir</a>
			<a href="login" class="btn btn-success">Ingresar</a>
		</div>
	</div>
	</div>
	

	<script type="text/javascript" src="<?php echo base_url('js/jquery.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap.js')?>"></script>
        
        <br>
        
        <div class="footer text-center ">
        <p>&copy; Universidad Tecnológica Metropolitana</p>
        <p>Estado de Chile</p>
      </div>

    </div> <!-- /container -->
</body>
</html>