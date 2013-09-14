<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block hidden-desktop" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<ul class="unstyled">
					<li><i style="padding-right: 8px" class="icon-building icon-large"></i><a href="<?php echo site_url('admin/agregarInstitucion'); ?>"> Agregar Institución</a></li>
					<li><a href="<?php echo site_url('admin'); ?>"><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</a></li>
					<li class="active"><a href="<?php echo site_url('admin/adminEstudiantes'); ?>"><i style="padding-right: 8px" class="icon-user icon-large"></i> Estudiantes</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-th-list icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-picture icon-large"></i> Propiedad</a></li>
				</ul>
			</div>
		</div>

		<div class="span9 offset2">
			<div class="bloquePegadoUp">
				<ul class="nav nav-pills fontSize2">
					<?php $this->load->view('admin/includes-estudiante/menu-cursos'); ?>
				</ul>
			</div>

				<div class="bloquePegadoDown">
					<?php //$this->load->view('estudiante/listaEstudiantes'); ?>

					<div class="row-fluid">
						<div class="span6 pull-left">
							<!-- <a href="#" class=""><i class="icon-plus icon-large"></i> Añadir estudiante nuevo</a> -->
								<a 
									id="#<?php //echo $value['id_time']; ?>" 
									class=""
									href=#"<?php //echo site_url('foro/foroModal/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
									data-target="#myModal" data-toggle="modal"><i class="icon-plus icon-large"></i> Añadir estudiante nuevo</a>
						</div>
						<div class="span6">
							<form class="form-search">
								<div class="input-append pull-right">
									<input type="text" class="search-query" placeholder="Estudiante">
									<span class="btn disabled"><i class="icon-search"></i> Buscar</span>
								</div>
							</form>
						</div>
					</div>

					<?php 
						for ($i=0; $i <10 ; $i++){
							$this->load->view('admin/includes-estudiante/lista-estudiantes');
						}
					 ?>
				</div>
					
		</div>

		</div>
	</div>
</div>

<!-- Modal del Perfil -->
<div id="myModal" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header" style="background-color: rgba(221, 221, 221, 0.3);">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
		  <h5 class="muted text-center" id="myModalLabel">Agregar estudiante</h5>
	</div>
	<div class="modal-body" id="">
		<?php $this->load->view('admin/includes/form-estudiantes'); ?>
	</div>

</div>