<?php echo form_open('profesor/setAsistenciaController/' . $asistencia[0]['claseID'], array('class' => '  formAsistencia')) ?>

<?php foreach ($asistencia as $estudiante): ?>
	<div class="media well-lista col-md-12" style="">
        
        <div class="col-md-2 col-xs-5" style="padding: 5px;">  
            
            <input type="hidden" name="hp<?php echo $estudiante['Estudiante_identificacion']; ?>" value="<?php echo $estudiante['Estudiante_identificacion']; ?>"> 
            
            <div class="btn-group" data-toggle="buttons">

                <label class="btn btn-default btn-green <?php if ($estudiante['Asistencia'] == 'si') {echo 'active';} ?>">
                    <input type="radio" <?php if ($estudiante['Asistencia'] == 'si') {echo 'checked';}?>
                        name="options<?php echo $estudiante['Estudiante_identificacion'] ?>" id="option1<?php echo $estudiante['Estudiante_identificacion'] ?>" value="si"> <span class="fa fa-check"></span>
                </label>

                <label class="btn btn-default btn-red <?php if ($estudiante['Asistencia'] == 'no') {echo 'active';}?>">
                    <input type="radio" <?php if ($estudiante['Asistencia'] == 'no') {echo 'checked';}?>
                    name="options<?php echo $estudiante['Estudiante_identificacion'] ?>" id="option2<?php echo $estudiante['Estudiante_identificacion'] ?>" value="no"> <span class="fa fa-times"></span>
                </label>
            </div> 
        </div>
        <div class="col-md-10 col-xs-7 pull-right" style="margin-left: 0px;">
            <a class="hidden-xs pull-right" href="#" style="padding-right: 20px;">
                <img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
            </a>
            <div class="media-body" style="padding-top: 15px;">
                <h5 class="media-heading text-success"><?php echo $estudiante['nombre'] .' '. $estudiante['apellido']; ?></h5>
            </div>
        </div>
	</div>
<?php endforeach; ?>

<div class="row" data-count="<?php echo count($asistencia); ?>">
    <div class="col-md-6 col-md-offset-3" style="margin-top: 20px">
       <!--  <button type="submmit" class="btn btn-primary btn-block btn-lg"><span class="fa fa-check"></span> Enviar</button>  -->
        
        <a class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm">
            <span class="fa fa-check"></span> Enviar
        </a>

		<div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">

                	<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Confirmación asistencia</h4>
                    </div>

                    <div class="modal-body">
                    	<strong>¿Deseas enviar?</strong> Se enviará un mensaje de texto a los Acudientes de los alumnos que no asistieron a esta clase.
                    </div>

					<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    					<button type="submmit" class="btn btn-primary"><span class="fa fa-check"></span> Enviar Asistencia</button>
					</div>

				</div>
			</div>
		</div>

    </div>
    <div class="alerta col-md-12" id="alertaAsistencia"></div>
</div>


</form>
<script>
   $('form.formAsistencia').on('submit', function(event) {

            event.preventDefault();

            var ran=Math.floor(Math.random()*1000000);

            var enlace = $(this).attr('action') + '/' + $(datepickerInput).val() + '/' + <?php echo count($asistencia); ?>;

            $(this).attr('id', ran);

            console.log(enlace);

            $.post(enlace, $(this).serialize(), function(data) {

                $('#'+ ran.toString() + ' div.alerta').html(data);
                $('.modal').modal('hide');
                self.location="#alertaAsistencia";

                //console.log(data);

            });

            $(this).find(':input').each(function() {
                //1console.log($(this).attr('attribute', 'value');('name').val());
            }); 
    });
</script> 
