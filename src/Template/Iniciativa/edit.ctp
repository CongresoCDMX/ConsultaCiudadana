<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iniciativa $iniciativa
 */
?>
<?= $this->Html->script('upload3') ?>
<?= $this->Html->script('ShowImagePreview') ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $iniciativa->id_iniciativa],
                ['confirm' => __('Are you sure you want to delete # {0}?', $iniciativa->id_iniciativa)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Iniciativa'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="iniciativa form large-9 medium-8 columns content">
    <?= $this->Form->create($iniciativa,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Iniciativa') ?></legend>
<?php
            echo $this->Form->control('fecha');
            echo $this->Form->control('fecha_cierre');
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
	  		    		      'options' => $turnado,																																										    																						    								    		    'empty' => 'selecciona']);

    echo $this->Form->control('segundo_turnado', ['type' => 'select',
	         	              'options' => $turnado,
	   						  'empty' => 'selecciona']);

    echo $this->Form->control('consulta');
    echo $this->CKEditor->replace('consulta');

	echo $this->Form->control('archivo_consulta', ['type' => 'file']);
	echo $this->Form->control('activo');

?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

