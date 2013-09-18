<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="lennin"></div>
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block hidden-desktop" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<?php $this->load->view('admin/includes/menu-admin'); ?>
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

						<div class="row-fluid  offset1 margen1" id="estudiante">
							<?php $this->load->view('admin/includes/forms/form-estudiantes');?>
						</div>

						<div class="row-fluid  offset1 margen1" id="profesor">
							<?php $this->load->view('admin/includes/forms/form-profesor');?>
						</div>

						<?php $this->load->view('admin/includes/forms/form-materia');?>

						<?php $this->load->view('admin/includes/forms/form-curso');?>

						<?php $this->load->view('admin/includes/forms/form-clase');?>
					</div>

				</div>

			</div>
		</div>
		
	</div>
</div>