<div class="container" style="">
	<div class="row">
		
		<?php $this->load->view('admin/includes/menu-admin'); ?>

		<div class="col-md-10 col-md-offset-2 col-md-clear">
			<div class="">

				<div class="panel-group" id="accordion">
				  
					<div class="panel panel-default">
					    <div class="panel-heading">
					    	<h4 class="panel-title">
					        	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					          		Cursos
					        	</a>
					    	</h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in">
					    	<div class="panel-body">
								<?php echo form_open('admin/estudianteLista/' . $datos['Institucion_rut'], array('class' => 'formajax')) ?>
						        	<div class="" data-toggle="buttons" style="">
									  <label class="btn Filtbar">
									    <input name="check10002" class="checkboxCurso" type="checkbox" value="10002">  1
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10003" class="checkboxCurso" type="checkbox" value="10003">  2
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10004" class="checkboxCurso" type="checkbox" value="10004">  3
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10005" class="checkboxCurso" type="checkbox" value="10005">  4
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10006" class="checkboxCurso" type="checkbox" value="10006">  5
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10007" class="checkboxCurso" type="checkbox" value="10007">  6.1
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10008" class="checkboxCurso" type="checkbox" value="10008">  6.2
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10009" class="checkboxCurso" type="checkbox" value="10009">  7
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10010" class="checkboxCurso" type="checkbox" value="10010">  8
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10001" class="checkboxCurso" type="checkbox" value="10001">  9
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10011" class="checkboxCurso" type="checkbox" value="10011">  10
									  </label>
									  <label class="btn Filtbar">
									    <input name="check10012" class="checkboxCurso" type="checkbox" value="10012">  11
									  </label>
									</div>
								
									<div class="col-md-8 col-md-clear col-md-offset-4">
										
											<div class="input-group pull-right" style="margin: 20px;">
												<input name="busquedaUser" data-uri="<?php echo site_url('admin/estudianteLista/' . $datos['Institucion_rut']) ?>" 
												type="search" class="form-control input-lg busquedaUser" placeholder="Escribe el nombre o la identificación del estudiante">
												<span class="btn disabled input-group-addon"><i class="fa fa-lg fa-search"></i></span>
											</div>
										
									</div>
									<div class="busquedaUserResul col-md-12 col-sm-12 col-xs-12 col-md-clear">
										
									</div>
									
								</form>
					    	</div>
					    </div>
					</div>

				</div>

			</div>

				<div class="">

					<div class="row">
						<div class="hidden col-md-6 pull-left margen-bottom">
								<a 
									id="#<?php //echo $value['id_time']; ?>" 	class=""
									href=#"<?php //echo site_url('foro/foroModal/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
									data-target="#myModal" data-toggle="modal"><i class="fa fa-plus fa-lg"></i> Añadir estudiante nuevo</a>
						</div>


					</div>

				</div>
					
		</div>

		</div>
	</div>
</div>


<!-- Modal Agregar Estudiante -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      	<div class="modal-content modal-correccion">

	        <div class="modal-header">
	         	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg text-error"></i></button>
	         	<h4 class="modal-title text-muted">Agregar estudiante</h4>
	        </div>

	        <div class="modal-body">
	        	<div class="row">
					<?php $this->load->view('admin/includes/forms/form-estudiantes'); ?>
				</div>
	        </div>

      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

