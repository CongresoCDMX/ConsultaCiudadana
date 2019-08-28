<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turnado $turnado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Turnado'), ['action' => 'edit', $turnado->id_turnado]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Turnado'), ['action' => 'delete', $turnado->id_turnado], ['confirm' => __('Are you sure you want to delete # {0}?', $turnado->id_turnado)]) ?> </li>
        <li><?= $this->Html->link(__('List Turnado'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turnado'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="turnado view large-9 medium-8 columns content">
    <h3><?= h($turnado->id_turnado) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($turnado->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Turnado') ?></th>
            <td><?= $this->Number->format($turnado->id_turnado) ?></td>
        </tr>
    </table>
</div>
