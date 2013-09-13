<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="lennin"></div>
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block hidden-desktop" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<ul class="unstyled">
					<li><a href="<?php echo site_url('admin/agregarInstitucion'); ?>"><i style="padding-right: 8px" class="icon-building icon-large"></i> Agregar Institución</a></li>
					<li class="active"><a href="<?php echo site_url('admin'); ?>"><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</a></li>
					<li><a href="<?php echo site_url('admin/adminEstudiantes'); ?>"><i style="padding-right: 8px" class="icon-user icon-large"></i> Estudiantes</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-th-list icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-picture icon-large"></i> Propiedad</a></li>
				</ul>
			</div>
		</div>

		<div class="span2 offset1 hidden-phone affix">
			<div class="row-fluid">
				<div id="nav-ejemplo" class="span12 offset4">
					<ul class="nav nav-stacked">
						<?php $this->load->view('admin/includes/menu-form'); ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="span2 visible-phone">
			<div >
				<ul class="nav nav-stacked">
					<?php $this->load->view('admin/includes/menu-form'); ?>
				</ul>
			</div>
		</div>

		<div class="span8 offset3">

			<div class="row-fluid">
				<div class="span11 offset1">
					
					<?php $this->load->view('admin/includes/select-institucion');?>
			
					<div class="" id="forms-registro">
				
						<?php $this->load->view('admin/includes/form-estudiantes');?>

						<?php $this->load->view('admin/includes/form-profesor');?>

						<?php $this->load->view('admin/includes/form-materia');?>

						<?php $this->load->view('admin/includes/form-curso');?>

						<?php $this->load->view('admin/includes/form-clase');?>
					</div>

				</div>

			</div>
		</div>
		
	</div>
</div>