<?php

?>
<?= $this->Html->script('upload3') ?>
<?= $this->Html->script('ShowImagePreview') ?>
<div class="row">
<div class="col-md-2 col-lg-2">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Iniciativa'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-md-10 col-lg-10">
    <?= $this->Form->create($iniciativa, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Agregar Iniciativa') ?></legend>
        <?php
            echo $this->Form->control('fecha_cierre');
            echo $this->Form->control('fecha');
            echo $this->Form->control('tipo', [
		    'options' => ['REFORMA'=> 'REFORMA', 'ADICION' => 'ADICIÓN', 'MODIFICACION' => 'MODIFICACIÓN', 'DEROGACION' => 'DEROGACIÓN', 'OTRA' => 'OTRA']
	    ]);

	    	    	                echo $this->Form->control('ley');
	    	    	                echo $this->Form->control('nombre');

													    echo $this->Form->control('suscrita',['type' => 'select',
														    									    					    		    'options' => $diputados,
																														    																    							    		    'empty' => 'selecciona']);

													    echo $this->Form->control('partido',['type' => 'select',
														    									    					    		    'options' => $options,
																														    																    							    		    'empty' => 'selecciona']);

													    echo $this->Form->control('adhiere._ids',['type' => 'select',
														    					  'options' => $diputados,
																				  'multiple' => 'multiple',
																				  'empty' => 'selecciona']);

												            echo $this->Form->control('dice');
													    echo $this->Form->control('propuesta');

			echo $this->Form->control('turnado', ['type' => 'select',
			         				    		  'options' => $turnado,
												  'empty' => 'selecciona']);

			echo $this->Form->control('segundo_turnado', ['type' => 'select',
												          'options' => $turnado,
												          'empty' => 'selecciona']);

            //echo $this->Form->control('consulta');
            //echo $this->CKEditor->replace('consulta');
            echo $this->Form->control('archivo_consulta', ['type' => 'file']);
	    ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
  </div>
</div>

