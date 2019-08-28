<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProposicionDiputado $proposicionDiputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $proposicionDiputado->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $proposicionDiputado->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Proposicion Diputado'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="proposicionDiputado form large-9 medium-8 columns content">
    <?= $this->Form->create($proposicionDiputado) ?>
    <fieldset>
        <legend><?= __('Edit Proposicion Diputado') ?></legend>
        <?php
            echo $this->Form->control('id_proposicion');
            echo $this->Form->control('id_diputado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
