<div class="row">
    <div class="col-md-12">
        <?php echo form_open('profesor/setIndicador/' . $listaAlumnos['numero'], array('class' => 'row formajaxReloaded')) ?>
            <div class="col-md-12">
                <p Class="text-muted col-md-12"><i class="fa fa-pencil fa-2x"></i><span> Crea un nuevo Indicador</span></p>

                <div class="col-md-7 col-md-clear">
                	<div class="col-md-12 input-group-lg col-md-clear">
                		<input type="text" name="contenido" required class="form-control" id="" placeholder="Crea un nuevo Indicador">
                	</div>
                	<div class="input-group-lg col-md-clear">
                		<!-- <input type="hidden" name="nota" max="5" min="0" required class="form-control" id="" placeholder="nota"> -->
                	</div>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-4 col-md-clear">
                    <select class="form-control input-lg tooltipInfo" required name="periodo" data-toggle="tooltip" data-placement="bottom" title="Escoge el período">
                        <option value="">Periodo</option>
                        <option value="1">Periodo 1</option>
                        <option value="2">Periodo 2</option>
                        <option value="3">Periodo 3</option>
                        <option value="4">Periodo 4</option>
                    </select>
                </div>

                <div id="datepickerContenido" class="col-md-1 col-sm-2 col-xs-4 fontSize2 col-md-clear" data-url= "">
                    <div class="date col-md-12 col-md-clear">
                        <input type="text" required name="fecha" class="hidden form-control input-lg" id="datepickerInputContenido" placeholder="fecha de asistencia" readonly>
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

                 <div class="alerta col-md-12 col-md-clear"></div>
            </div>

        </form>
    </div>
    
    <?php $periodo = 1;?>
    <div id="listaIndicadores" class="col-md-12 divloaded" data-url="<?php echo site_url('profesor/getIndicador/' . $listaAlumnos['numero']); ?>">
        
        <?php foreach ($contenido_indicadores as $key => $indicador): ?>
            
            <?php if ($periodo != $indicador['periodo']): ?>
                <div class="well-lista row" style="margin-top: 26px;">  
                <?php $periodo = $indicador['periodo']; ?>
            <?php else: ?> 
             <div class="well-lista row" style="margin-top: 8px;">  
            <?php endif ?>
                          
                    <div class="col-md-10 col-xs-10" id="">
                        <div class="btn-group pull-left" data-toggle="buttons" style="padding: 6px 0px;">
                            <label class="disabled btn btn-default btn-green btn-xs <?php if ($indicador['estado'] == 1) {echo 'active';} ?>">
                                <input class="" type="checkbox" name="options" id="option1" value="1" <?php if ($indicador['estado'] == 1) {echo 'checked';} ?>> 
                                <span class="fa fa-check"></span>
                            </label>
                        </div> 

                        <span class="truncate" style="padding: 8px 5px;font-size: 13px;">
                            <?php echo $indicador['contenido']; ?></span>
                    </div>
                    <div class="col-md-2 col-xs-2" style="padding: 6px 0px;">
                        <span class="label label-default icono"><i class="fa fa-clock-o"></i></span>
                        <span id="" class="label label-<?php echo $indicador['periodo']; ?> exampler icono truncate-min" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus." style="cursor:help">Periodo <?php echo $indicador['periodo']; ?></span>
                        
                    </div>               
            </div>

        <?php endforeach; ?>
        
    </div>
</div>

