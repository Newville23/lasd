<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="lennin"></div>
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block visible-phone" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<ul class="unstyled">
					<li><i style="padding-right: 8px" class="icon-picture icon-large"></i><a href="#"> Propiedad</a></li>
					<li class="active"><a href="#"></a><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</li>
					<li><a href="#"></a><i style="padding-right: 8px" class="icon-film icon-large"></i> Estudiantes</li>
					<li><a href="#"></a><i style="padding-right: 8px" class="icon-th-list icon-large"></i> Propiedad</li>
					<li><a href="#"></a><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</li>
					<li><a href="#"></a><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</li>
					<li><a href="#"></a><i style="padding-right: 8px" class="icon-picture icon-large"></i> Propiedad</li>
				</ul>
			</div>
		</div>

		<div class="span2 offset2 hidden-phone affix">

			<div id="nav-ejemplo">
				<ul class="nav nav-stacked">
					<?php $this->load->view('admin/includes/menu-form'); ?>
				</ul>
			</div>

		</div>

		<div class="span2 visible-phone">
			<div >
				<ul class="nav nav-stacked">
					<?php $this->load->view('admin/includes/menu-form'); ?>
				</ul>
			</div>
		</div>

		<div class="span8 offset4">

			<?php $this->load->view('admin/includes/form-institucion');?>

			<?php $this->load->view('admin/includes/form-estudiantes');?>

			<?php $this->load->view('admin/includes/form-profesor');?>

			<?php $this->load->view('admin/includes/formularios');?>

		</div>
	</div>
</div>