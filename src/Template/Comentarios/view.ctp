<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comentario'), ['action' => 'edit', $comentario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comentario'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comentario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comentarios view large-9 medium-8 columns content">
    <h3><?= h($comentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($comentario->correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Archivo') ?></th>
            <td><?= h($comentario->archivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comentario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Iniciativa') ?></th>
            <td><?= $this->Number->format($comentario->id_iniciativa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($comentario->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Me Gusta') ?></th>
            <td><?= $comentario->me_gusta ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Gusta') ?></th>
            <td><?= $comentario->no_gusta ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($comentario->comentario)); ?>
    </div>
</div>
