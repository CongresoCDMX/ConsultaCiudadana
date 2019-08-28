<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $partido->id_partido],
                ['confirm' => __('Are you sure you want to delete # {0}?', $partido->id_partido)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Partido'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="partido form large-9 medium-8 columns content">
    <?= $this->Form->create($partido) ?>
    <fieldset>
        <legend><?= __('Edit Partido') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
