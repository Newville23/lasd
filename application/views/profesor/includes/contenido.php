<div class="row">
    
    <div class="col-md-12">
        <form action="" class="row" role="form">
            <div class="col-md-12">
            <p Class="text-muted col-md-12"><i class="fa fa-pencil fa-2x"></i><span> Crea un nuevo Indicador</span></p>

            <div class="col-md-7 col-md-clear">
            	<div class="col-md-12 input-group-lg col-md-clear">
            		<input type="text" required class="form-control" id="" placeholder="Crea un nuevo Indicador">
            	</div>
            	<div class="col-md-2 input-group-lg">
            		<input type="number" required class="form-control hidden" id="" placeholder="4">
            	</div>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-4 col-md-clear">
                <select class="form-control input-lg tooltipInfo" data-toggle="tooltip" data-placement="bottom" title="Escoge el período">
                    <option>Periodo</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div id="datepickerContenido" class="col-md-1 col-sm-2 col-xs-4 fontSize2 col-md-clear" data-url= "">
                <div class="date col-md-12 col-md-clear">
                    <input type="text" required type="text"  class="hidden form-control input-lg" id="datepickerInputContenido" placeholder="fecha de asistencia" readonly>
                    <div class="">
                        <button class="btn btn-default btn-lg btn-block tooltipInfo" type="button" id="datepickerContenidoButton" data-toggle="tooltip" 
                            data-placement="bottom" title="Fecha de evaluación del indicador">
                            <span class="fa fa-calendar fa-lg" style=""></span>
                        </button>
                    </div>
                </div>
             </div>

			 <div class="col-md-2 col-sm-2 col-xs-4 col-md-clear">
                    <div class="">
                        <button type="submmit" class="btn btn-primary btn-lg btn-block tooltipInfo" data-toggle="tooltip" 
                            data-placement="bottom" title="Guardar">Guardar</button>
                    </div>
			 		
			 </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <?php for ($i=0; $i < 10; $i++): ?>
            <div class="well-lista row" style="margin-top: 10px;">
                                      
					<div class="col-xs-2 btn-group pull-left" data-toggle="buttons" style="">
						<label class="btn btn-default btn-green">
						    <input type="checkbox" checked name="options" id="option1" value="si"> 
					        <span class="fa fa-check"></span>
						</label>
					</div> 

                    <div class=" col-xs-7 pull-left" id="" style="padding: 6px 0px;">
                        <span class="truncate">Añadir acumulados cuadros Gtr Lorem ipsum dolor sit amet, consectetur.</span>
                        
                    </div>
                    <div class="col-md-1 col-xs-1 pull-right" style="padding: 6px 0px;">
                        <span id="" class="label label-primary exampler" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus." style="cursor:help">1</span>
                    </div>               
            </div>
        <?php endfor; ?>
    </div>
</div>

