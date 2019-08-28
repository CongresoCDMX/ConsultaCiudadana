<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IniciativaDiputado $iniciativaDiputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Iniciativa Diputados'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="iniciativaDiputados form large-9 medium-8 columns content">
    <?= $this->Form->create($iniciativaDiputado) ?>
    <fieldset>
        <legend><?= __('Add Iniciativa Diputado') ?></legend>
        <?php
            echo $this->Form->control('id_iniciativa');
            echo $this->Form->control('id_diputado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
