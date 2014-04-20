<div class="barra-propiedades">
	<button class="btn btn-lg btn-inverse btn-block hidden-lg" id="boton-barra">
		<i class="fa fa-arrow-down fa-lg text-muted"></i>
	</button>
	<div class="bp-envoltura">
		<ul class="list-unstyled">
			<a href="<?php echo site_url('admin/agregarInstitucion'); ?>">
				<li  class="<?php if ($active == 1) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-building fa-lg"></i> Agregar Institución</li>
			</a>
			<a href="<?php echo site_url('admin'); ?>">
				<li class="<?php if ($active == 2) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-list-alt fa-lg"></i> Formularios</li>
			</a>
			<a href="<?php echo site_url('admin/adminEstudiantes'); ?>">
				<li class="<?php if ($active == 3) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-user fa-lg"></i> Estudiantes</li>
			</a>
			<a href="<?php echo site_url('admin/adminDocentes'); ?>">
				<li class="<?php if ($active == 4) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-group fa-lg"></i> Docentes</li>
			</a>
			<a href="<?php echo site_url('admin/estadisticas'); ?>">
				<li  class="<?php if ($active == 6) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-bars-chart fa-lg"></i> Estadisticas</li>
			</a>
			<a href="#">
				<li class="<?php if ($active == 5) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-folder-open fa-lg"></i> Propiedad</li>
			</a>
			<a href="#">
				<li class="<?php if ($active == 7) {echo 'active';} ?>"><i style="padding-right: 8px" class="fa fa-wrench fa-lg"></i> Configuraciones</a>
			</a>
		</ul>
	</div>
</div>

