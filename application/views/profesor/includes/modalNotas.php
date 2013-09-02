  <div id="myModalasd" class="modal hide modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i></button>
        <h4 class="muted" id="myModalLabel">Notas</h4>
    </div>
    <?php echo form_open(''); ?>
        <div class="modal-body" id="prueba">
            <div class="row-fluid">         
                <input class="span12" placeholder="Tipo de evaluación" type="text">
                <textarea class="span12" placeholder="Detalle" name="" id="" rows="4"></textarea>
                <input class="span12 rangeText" min="1" max="100" name="" placeholder="Peso %" type="number" id="text<?php echo $rand = rand(); ?>">
                <div class="span11">
                    <input class="range" name="" min="1" step="1" max="100" type="range" id="range<?php echo $rand; ?>">  
                </div>
            </div>
          
        </div>
        <div class="modal-footer">
            <button class="btn" type="reset">Limpiar</button>
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form>
  </div>