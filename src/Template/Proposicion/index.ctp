<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proposicion[]|\Cake\Collection\CollectionInterface $proposicion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Proposición'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="proposicion index large-9 medium-8 columns content">
    <h3><?= __('Proposicion') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('legislatura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('año') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periodo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_publicacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_orden') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proposicion as $proposicion): ?>
            <tr>
                <td><?= h($proposicion->legislatura) ?></td>
                <td><?= h($proposicion->año) ?></td>
                <td><?= h($proposicion->periodo) ?></td>
                <td><?= h($proposicion->fecha_publicacion) ?></td>
                <td><?= $this->Number->format($proposicion->no_orden) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $proposicion->id_proposicion]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proposicion->id_proposicion]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proposicion->id_proposicion], ['confirm' => __('Are you sure you want to delete # {0}?', $proposicion->id_proposicion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
