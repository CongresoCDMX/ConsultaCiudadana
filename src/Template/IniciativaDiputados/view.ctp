<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IniciativaDiputado $iniciativaDiputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Iniciativa Diputado'), ['action' => 'edit', $iniciativaDiputado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Iniciativa Diputado'), ['action' => 'delete', $iniciativaDiputado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iniciativaDiputado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Iniciativa Diputados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Iniciativa Diputado'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="iniciativaDiputados view large-9 medium-8 columns content">
    <h3><?= h($iniciativaDiputado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($iniciativaDiputado->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Iniciativa') ?></th>
            <td><?= $this->Number->format($iniciativaDiputado->id_iniciativa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Diputado') ?></th>
            <td><?= $this->Number->format($iniciativaDiputado->id_diputado) ?></td>
        </tr>
    </table>
</div>
