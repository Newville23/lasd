<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="lennin"></div>
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block visible-phone" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<ul class="unstyled">
					<li class="active"><i style="padding-right: 8px" class="icon-building icon-large"></i><a href="#"> Agregar Institución</a></li>
					<li><a href="<?php echo site_url('admin'); ?>"><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-film icon-large"></i> Estudiantes</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-th-list icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-picture icon-large"></i> Propiedad</a></li>
				</ul>
			</div>
		</div>


		<div class="span8 offset2">

			<?php $this->load->view('admin/includes/form-institucion');?>

		</div>
	</div>
</div>