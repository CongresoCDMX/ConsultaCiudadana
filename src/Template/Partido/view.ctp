<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partido'), ['action' => 'edit', $partido->id_partido]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partido'), ['action' => 'delete', $partido->id_partido], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->id_partido)]) ?> </li>
        <li><?= $this->Html->link(__('List Partido'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partido'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partido view large-9 medium-8 columns content">
    <h3><?= h($partido->id_partido) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($partido->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Partido') ?></th>
            <td><?= $this->Number->format($partido->id_partido) ?></td>
        </tr>
    </table>
</div>
