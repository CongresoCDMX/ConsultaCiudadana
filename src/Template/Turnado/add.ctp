<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turnado $turnado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Turnado'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="turnado form large-9 medium-8 columns content">
    <?= $this->Form->create($turnado) ?>
    <fieldset>
        <legend><?= __('Add Turnado') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
