<ul class="unstyled">

	<?php //foreach ($foros as $key => $value): ?>
		<li>
			<div class="media bloque-top well-white well2">
		  		<a class="pull-left" href="#">
		    		<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
		  		</a>
		  		<div class="media-body">
		    		<h5 class="media-heading text-info foroTitulo">
		    			
		    			<a href="#myModal" role="button" class="" data-toggle="modal">			
				    			<?php echo 'Titulo del Foro'//$value['titulo']; ?>
		    			</a>
		    		</h5>
		    		<p>
		    			<span class="voto"><?php echo '4'//$value['puntos']; ?></span> 
			   			<span class=""><i class="icon-thumbs-up-alt icon-large muted"></i></span>
			   			<span class="inforo"> hace 2 días por <a href="#">Profesor</a></span>
			   		</p>
				</div>
			</div>
		</li>
	<?php //endforeach; ?>
</ul>

<div id="myModal" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
    	<p id="myModalLabel" class="muted">Foro de discución de la materia</p>
  	</div>
  	
  	<div class="modal-body" id="">
    	<p>One fine body…</p>
  	</div>
  	
  	<div class="modal-footer">
<!--     <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button> -->
  	</div>
</div>