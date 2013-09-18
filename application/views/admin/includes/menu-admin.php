<ul class="unstyled">
	<li class="<?php if ($active == 1) {echo 'active';} ?>" ><i style="padding-right: 8px" class="icon-building icon-large"></i><a href="<?php echo site_url('admin/agregarInstitucion'); ?>"> Agregar Institución</a></li>
	<li class="<?php if ($active == 2) {echo 'active';} ?>" ><a href="<?php echo site_url('admin'); ?>"><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</a></li>
	<li class="<?php if ($active == 3) {echo 'active';} ?>" ><a href="<?php echo site_url('admin/adminEstudiantes'); ?>"><i style="padding-right: 8px" class="icon-user icon-large"></i> Estudiantes</a></li>
	<li class="<?php if ($active == 4) {echo 'active';} ?>" ><a href="<?php echo site_url('admin/adminDocentes'); ?>"><i style="padding-right: 8px" class="icon-group icon-large"></i> Docentes</a></li>
	<li class="<?php if ($active == 6) {echo 'active';} ?>" ><a href="#"><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</a></li>
	<li class="<?php if ($active == 5) {echo 'active';} ?>" ><a href="#"><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</a></li>
	<li class="<?php if ($active == 7) {echo 'active';} ?>" ><a href="#"><i style="padding-right: 8px" class="icon-wrench icon-large"></i> Configuraciones</a></li>
</ul>