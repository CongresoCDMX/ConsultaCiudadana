<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diputado $diputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Diputado'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="diputado form large-9 medium-8 columns content">
    <?= $this->Form->create($diputado) ?>
    <fieldset>
        <legend><?= __('Add Diputado') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('id_partido', ['type' => 'select',
	                              'options' => $options,
				      'empty' => 'selecciona']);
			echo $this->Form->control('foto');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
