<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProposicionDiputado $proposicionDiputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Proposicion Diputado'), ['action' => 'edit', $proposicionDiputado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proposicion Diputado'), ['action' => 'delete', $proposicionDiputado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proposicionDiputado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Proposicion Diputado'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proposicion Diputado'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="proposicionDiputado view large-9 medium-8 columns content">
    <h3><?= h($proposicionDiputado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($proposicionDiputado->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Proposicion') ?></th>
            <td><?= $this->Number->format($proposicionDiputado->id_proposicion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Diputado') ?></th>
            <td><?= $this->Number->format($proposicionDiputado->id_diputado) ?></td>
        </tr>
    </table>
</div>
