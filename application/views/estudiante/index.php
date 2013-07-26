		<div class="container-fluid container-fluid2">
			<div class="row-fluid">

				<div class="span3" id="perfil">
					<div class="thumbnail" id="miniatura">
						<img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 150px;" 
						src="<?php echo base_url('bootstrap/img/images/avatar.png'); ?>">
					</div>
					<div class="caption" id="perfil-caption">
						<h4>Lennin Alonso Suescun Devia</h4>
						<p><span class="badge">Curso: </span> 9A</p>
						<p><span class="badge">Edad: </span> 22</p>
						<p><span class="badge">Tarjeta de identidad: </span> 1143124139</p>
					</div>
					<div class="caption" id="perfil-caption2">
						<h6 class="muted">Lennin Alonso Suescun Devia</h6>
					</div>
					<p>
					  <a href="#myModal" role="button" class="btn btn-info span5" data-toggle="modal">Ver</a>
					</p>
				</div>


				<div class="span5 well" id="menu">
					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorMaterias">Materias</div>
					</div>
					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorProfes">Profesores</div>
					</div>
					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorMensaje">Mensajes</div>
					</div>
					<div class="row-fluid">
						<div class="span12 Matbar menu" id="apuntadorHorario">Horario</div>
					</div>
				</div>
				
				<div class="span6 well" id="materias">
					<div class="row-fluid">
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
						<div class="Matbar2">Hola</div>
					</div>
				</div>

				<div class="span6 well" id="profes">
					<ul>
						<li>Nombre de los profesores</li>
						<li>Nombre de los profesores</li>
						<li>Nombre de los profesores</li>
						<li>Nombre de los profesores</li>
						<li>Nombre de los profesores</li>
						<li>Nombre de los profesores</li>
						<li>Nombre de los profesores</li>
					</ul>
				</div>

				<div class="span6 well" id="horario">
					<ul>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
						<li>Nombre de las materias del horario</li>
					</ul>
				</div>
			
			</div>
		</div>

		<!-- Modal del Perfil -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				  <h3 id="myModalLabel">Datos del Estudiante</h3>
			</div>
			<div class="modal-body">
				<h3>Lennin Alonso Suescun Devia</h3>
				<p class="muted">
					Info completa, resumen de cosas, en editar saldrá un formulario en model con cambio de imagen algunos datos etc,
				</p>
				
			</div>
			<div class="modal-footer">
				  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				  <button class="btn btn-primary">Editar</button>
			</div>
		</div>

