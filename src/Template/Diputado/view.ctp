<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diputado $diputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Diputado'), ['action' => 'edit', $diputado->id_diputado]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Diputado'), ['action' => 'delete', $diputado->id_diputado], ['confirm' => __('Are you sure you want to delete # {0}?', $diputado->id_diputado)]) ?> </li>
        <li><?= $this->Html->link(__('List Diputado'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diputado'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diputado view large-9 medium-8 columns content">
    <h3><?= h($diputado->id_diputado) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($diputado->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Diputado') ?></th>
            <td><?= $this->Number->format($diputado->id_diputado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Partido') ?></th>
            <td><?= $this->Number->format($diputado->id_partido) ?></td>
        </tr>
    </table>
</div>
