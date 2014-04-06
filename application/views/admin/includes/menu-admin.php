<div class="barra-propiedades">
	<button class="btn btn-lg btn-inverse btn-block hidden-lg" id="boton-barra">
		<i class="icon-arrow-down icon-large text-muted"></i>
	</button>
	<div class="bp-envoltura">
		<ul class="list-unstyled">
			<a href="<?php echo site_url('admin/agregarInstitucion'); ?>">
				<li  class="<?php if ($active == 1) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-building icon-large"></i> Agregar Institución</li>
			</a>
			<a href="<?php echo site_url('admin'); ?>">
				<li class="<?php if ($active == 2) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</li>
			</a>
			<a href="<?php echo site_url('admin/adminEstudiantes'); ?>">
				<li class="<?php if ($active == 3) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-user icon-large"></i> Estudiantes</li>
			</a>
			<a href="<?php echo site_url('admin/adminDocentes'); ?>">
				<li class="<?php if ($active == 4) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-group icon-large"></i> Docentes</li>
			</a>
			<a href="<?php echo site_url('admin/estadisticas'); ?>">
				<li  class="<?php if ($active == 6) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</li>
			</a>
			<a href="#">
				<li class="<?php if ($active == 5) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</li>
			</a>
			<a href="#">
				<li class="<?php if ($active == 7) {echo 'active';} ?>"><i style="padding-right: 8px" class="icon-wrench icon-large"></i> Configuraciones</a>
			</a>
		</ul>
	</div>
</div>

