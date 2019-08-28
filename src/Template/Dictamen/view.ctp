<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dictaman $dictaman
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dictaman'), ['action' => 'edit', $dictaman->id_dictamen]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dictaman'), ['action' => 'delete', $dictaman->id_dictamen], ['confirm' => __('Are you sure you want to delete # {0}?', $dictaman->id_dictamen)]) ?> </li>
        <li><?= $this->Html->link(__('List Dictamen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dictaman'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dictamen view large-9 medium-8 columns content">
    <h3><?= h($dictaman->id_dictamen) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dictamen') ?></th>
            <td><?= h($dictaman->dictamen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Dictamen') ?></th>
            <td><?= $this->Number->format($dictaman->id_dictamen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Iniciativa') ?></th>
            <td><?= $this->Number->format($dictaman->id_iniciativa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Estatus') ?></th>
            <td><?= $this->Number->format($dictaman->id_estatus) ?></td>
        </tr>
    </table>
</div>
