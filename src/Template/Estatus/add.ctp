<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estatus $estatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Estatus'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estatus form large-9 medium-8 columns content">
    <?= $this->Form->create($estatus) ?>
    <fieldset>
        <legend><?= __('Agregar Estatus') ?></legend>
        <?php
            echo $this->Form->control('estatus');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
