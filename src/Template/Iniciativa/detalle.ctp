<?php

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Lista de Iniciativas'), ['action' => 'lista']) ?> </li>
    </ul> 
</nav>
<div class="iniciativa view large-9 medium-8 columns content">
<h3>Días restantes:  <?php  $date1= $iniciativa['fecha'];
                           // $date2= $iniciativa['fecha_cierre'];
                            $da1 = strtotime($date1);
			   // $da2 = strtotime($date2);
                           $now = time();
                           $diff = $da1-$now;
			   echo floor($diff / (60*60/24));
 ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($iniciativa['tipo']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turnado') ?></th>
            <td><?= h($iniciativa['nom_turnado']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suscrita') ?></th>
            <td><?= h($iniciativa['nombre']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Partido') ?></th>
            <td><?= h($iniciativa['nom_partido']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adhiere') ?></th>
            <td><?= h($iniciativa['adhiere']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de Inicio') ?></th>
             <td><?= h($iniciativa['fecha']) ?></td>
	</tr>
    </table>
    <div class="row">
        <h4><?= __('Ley') ?></h4>
        <?= h($iniciativa['ley']); ?>
    </div>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= h($iniciativa['nombre']) ?>
    </div>
    <div class="row">
        <h4><?= __('Dice') ?></h4>
        <?= h($iniciativa['dice']) ?>
    </div>
    <div class="row">
        <h4><?= __('Propuesta') ?></h4>
        <?= h($iniciativa['propuesta']) ?>
    </div>
    <div class="row">
        <h4><?= __('Consulta') ?></h4>
        <?= h($iniciativa['consulta']) ?>
    </div>

    <?= $this->Form->create($comentario) ?>
        <fieldset>
	        <legend><?= __('Añade un comentario') ?></legend>
		        <?php
                              echo $this->Form->control('id_iniciativa',['type' => 'hidden', 'value'=>$iniciativa['id_iniciativa']]);
                              echo $this->Form->control('correo');
	                      echo $this->Form->control('comentario');
			      echo $this->Form->control('archivo',['type'=>'file']);
	            ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>

    </div>

