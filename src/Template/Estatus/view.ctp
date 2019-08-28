<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estatus $estatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estatus'), ['action' => 'edit', $estatus->id_estatus]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estatus'), ['action' => 'delete', $estatus->id_estatus], ['confirm' => __('Are you sure you want to delete # {0}?', $estatus->id_estatus)]) ?> </li>
        <li><?= $this->Html->link(__('List Estatus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estatus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estatus view large-9 medium-8 columns content">
    <h3><?= h($estatus->id_estatus) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Estatus') ?></th>
            <td><?= h($estatus->estatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Estatus') ?></th>
            <td><?= $this->Number->format($estatus->id_estatus) ?></td>
        </tr>
    </table>
</div>
