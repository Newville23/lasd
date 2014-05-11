<div class="modal-dialog">
    <div class="modal-content">

	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg text-error"></i></button>
	        <h4 class="modal-title text-muted">Agregar Evaluación</h4>
	    </div>

	    <div class="modal-body" id="">

			 <?php echo form_open('user/' . $controller, array('class' => '  formajax')); ?>
			 
			 	<div class="alerta"></div>

				 <div class="row">

				 	<div class="col-md-12 alert alert-info" style="margin-top: 20px;">
						Selecciona el periodo para filtrar indicadores:
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default btn-lg">
								<input class="checkbox-filtro" id="periodo1" value="1" type="radio" name="options">Periodo 1
							</label>
							<label class="btn btn-default btn-lg">
								<input class="checkbox-filtro" id="periodo2" value="2" type="radio" name="options">Periodo 2
							</label>
							<label class="btn btn-default btn-lg">
								<input class="checkbox-filtro" id="periodo3" value="3" type="radio" name="options">Periodo 3
							</label>
							<label class="btn btn-default btn-lg">
								<input class="checkbox-filtro" id="periodo4" value="4" type="radio" name="options">Periodo 4
							</label>
						</div>
					</div>
					<?php if (isset($indicadores)): ?>
						<div class="padding4">			
						<?php foreach ($indicadores as $key => $indicador): ?>
							
					 	<div class="well-lista col-md-12 col-xs-12 container-filt hidden hoho<?php echo $indicador['periodo']; ?>" style="margin-top: 8px;"> 
							
								<div class="col-md-10 col-xs-10" id="">
			                        <div class="btn-group pull-left" data-toggle="" style="padding: 6px 0px;">
			                            <label class="">
			                                <input class="roundedOne" type="radio" name="indicadorLogro" id="<?php echo $indicador['id']; ?>" value="<?php echo $indicador['id']; ?>"> 
			                                <span class=""></span>
			                            </label>
			                        </div> 

			                        <span class="truncate exampler" style="padding: 8px 5px;font-size: 13px;cursor:pointer;" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" 
			                        data-content="<?php echo $indicador['contenido']; ?>"><strong>Indicador: </strong>
			                            <?php echo $indicador['contenido']; ?>
			                        </span>
			                    </div>
			                    <div class="col-md-2 col-xs-2" style="padding: 6px 0px;">
			                        <span class="label label-default exampler" data-container="body" data-toggle="popover" data-title="Fecha límite" data-trigger="hover" data-placement="bottom" 
			                        data-content="<?php echo $indicador['fecha_vencimiento']; ?>" style="cursor:pointer;"><i class="fa fa-clock-o"></i></span>			  
			                    </div> 
					 	</div>    
					 	<?php endforeach ?> 
					 	</div>
				 	<?php endif ?>   
					
					<div class="margen-top-bottom col-md-12 col-xs-12">
				    	<input class="form-control margen-top-bottom2 input-lg" name="tipoeval" placeholder="Tipo de evaluación" type="text" value="<?php if (isset($logro)) { echo $logro['tipo_evaluacion'];} ?>">

				    	<textarea class="form-control margen-top-bottom2 input-lg" placeholder="Detalle" name="detalleNota" id="" rows="4"><?php if (isset($logro)) { echo $logro['concepto'];} ?></textarea>

				    	<input class="form-control rangeText margen-top-bottom2 input-lg clear-input" min="1" max="100" name="peso" placeholder="Peso %" value="<?php if (isset($logro)) { echo $logro['ponderacion'];} ?>"
				    	type="number" id="text<?php echo $rand = rand(); ?>">
				    </div>
<!-- 				
				    <div class="col-md-11">
				    	<input class="range" style="width: 100%;" name="" min="1" value="<?php if (isset($logro)) { echo $logro['ponderacion'];} ?>"
				    		step="1" max="100" type="range" id="range<?php echo $rand; ?>">  
				    </div> -->
				 </div>
				
				<div class="btn-group margen-top-bottom2 btn-group-justified">
					<div class="btn-group">
						<button class="btn btn-default btn-lg" type="reset">Limpiar</button>
					</div>
			     	<div class="btn-group">
			     		<button class="btn btn-primary btn-lg" type="submit">Guardar</button>
			     	</div>
			 	</div>
			 </form> 


			<script src="<?php echo base_url("bootstrap/js/bibliotecas/form-ajax.js"); ?>"></script>
			<script>
				 $('.exampler').popover();

				//$('.container-filt').addClass('hidden');
				$('.checkbox-filtro').on('change', function(event) {
						
					event.preventDefault();
					var id_sel = '.hoho' + $(this).val();

					$('.container-filt').addClass('hidden');

					$(id_sel).removeClass('hidden');
					$('.cont-aparecer').removeClass('hidden');
					console.log($(this).val());
						/* Act on the event */
				});
			</script>

		</div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
