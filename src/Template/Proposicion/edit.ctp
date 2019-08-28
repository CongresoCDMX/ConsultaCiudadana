<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proposicion $proposicion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $proposicion->id_proposicion],
                ['confirm' => __('Are you sure you want to delete # {0}?', $proposicion->id_proposicion)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Proposicion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="proposicion form large-9 medium-8 columns content">
    <?= $this->Form->create($proposicion) ?>
    <fieldset>
        <legend><?= __('Edit Proposicion') ?></legend>
        <?php
            echo $this->Form->control('legislatura');
            echo $this->Form->control('año');
            echo $this->Form->control('periodo');
            echo $this->Form->control('fecha_publicacion');
            echo $this->Form->control('no_orden');
            echo $this->Form->control('nombre');
            echo $this->Form->control('id_diputado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
