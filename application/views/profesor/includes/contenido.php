<div class="row">
    
    <div class="col-md-12">
        <form action="" class="row" role="form">
            <p Class="text-muted col-md-12"><i class="fa fa-pencil fa-2x"></i><span> Crea un nuevo Indicador</span></p>

            <div class="input-group-lg col-md-8 col-sm-8 col-xs-8">
                <input type="text" required class="form-control" id="logros" placeholder="Crea un nuevo Logro/indicador">
            </div>


			<div id="datepickerContenido" class="col-md-1 col-sm-1 col-xs-4 margen-bottom fontSize2" data-url= "">
			    <div class="date">
			        <input type="text" required type="text"  class="hidden form-control input-lg" id="datepickerInputContenido" placeholder="fecha de asistencia" readonly>
			        <span class="">
			            <button class="btn btn-default btn-lg" type="button" id="datepickerContenidoButton">
			                <span class="fa fa-calendar fa-lg" style=""></span>
			            </button>
			        </span>
			    </div>
			 </div>
			 <div class="col-md-3 col-sm-3 col-xs-12">
				<button type="submmit" class="btn btn-primary btn-lg"><span class="fa fa-check"></span> Crear</button>
			 </div>
            

        </form>
    </div>

    <div class="col-md-12">
        <?php for ($i=0; $i < 10; $i++): ?>
            <div class="well-lista row" style="margin-top: 10px;">
                
                                           
					<div class="col-md-2 col-xs-2 btn-group" data-toggle="buttons">
						<label class="btn btn-default btn-green">
						    <input type="checkbox" checked name="options" id="option1" value="si"> 
					        <span class="fa fa-check"></span>
						</label>
					</div> 

                    <div class="col-md-10 col-xs-10 truncate" style="margin-left: 0px;">
                        <h5 class="text-success ">Añadir acumulados cuadros Gtr Lorem ipsum dolor sit amet, consectetur.</h5>
                    </div>
                
            </div>
        <?php endfor; ?>
    </div>
</div>