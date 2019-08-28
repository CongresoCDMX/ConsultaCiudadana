<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proposicion $proposicion
 */
?>
<?= $this->Html->script('upload3') ?>
<?= $this->Html->script('ShowImagePreview') ?>

<div class="col-md-2 col-lg-2" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista de Proposición'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-md-10 col-lg-10" id="actions-sidebar">
    <?= $this->Form->create($proposicion, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Agregar Proposicion') ?></legend>
        <?php
            echo $this->Form->control('legislatura', [
            		    'options' => ['primera'=> 'I PRIMERA', 'segunda' => 'II SEGUNDA', 'tercera' => 'III TERCERA', 'cuarta' => 'IV CUARTA', 'quinta' => 'V QUINTA']
            	    ]);
             echo $this->Form->control('año', [
            		    'options' => ['uno'=> 'I', 'dos' => 'II', 'tres' => 'III', 'cuatro' => 'IV', 'cinco' => 'V']
            	    ]);
            echo $this->Form->control('periodo', [
                       		    'options' => ['primera'=> 'I  Periodo', 'segunda' => 'II SEGUNDA', 'tercera' => 'III TERCERA', 'cuarta' => 'IV CUARTA', 'quinta' => 'V QUINTA']
                       	    ]);
            echo $this->Form->control('fecha_publicacion');
            echo $this->Form->control('no_orden');
            echo $this->Form->control('nombre');
            echo $this->Form->control('autor._ids',['type' => 'select',
			     'options' => $diputados,
				 'multiple' => 'multiple',
				 'empty' => 'selecciona']);
			echo $this->Form->control('archivo_consulta', ['type' => 'file']);
            echo "<br>";
        ?>
    </fieldset>

    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
