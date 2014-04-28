    <div id="listaIndicadores" class="col-md-12 divloaded" data-url="<?php echo site_url('profesor/getIndicador/' . $numeroClase); ?>">
        <?php foreach ($contenido_indicadores as $key => $indicador): ?>
            <div class="well-lista row" style="margin-top: 10px;">
                                      
                    <div class="col-md-10 col-xs-10" id="">
                        <div class="btn-group pull-left" data-toggle="buttons" style="padding: 6px 0px;">
                            <label class="btn btn-default btn-green btn-xs <?php if ($indicador['estado'] == 1) {echo 'active';} ?>">
                                <input type="checkbox" name="options" id="option1" value="1" <?php if ($indicador['estado'] == 1) {echo 'checked';} ?>> 
                                <span class="fa fa-check"></span>
                            </label>
                        </div> 

                        <span class="truncate" style="padding: 8px 5px;font-size: 13px;">
                            <?php echo $indicador['contenido']; ?></span>
                    </div>
                    <div class="col-md-1 col-xs-1 pull-right" style="padding: 6px 0px;">
                        <span class="label label-default icono"><i class="fa fa-clock-o"></i></span>
                        <span id="" class="label label-primary exampler icono truncate-min" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus." style="cursor:help">Periodo <?php echo $indicador['periodo']; ?></span>
                    </div>               
            </div>

        <?php endforeach; ?>
    </div>