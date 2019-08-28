<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido[]|\Cake\Collection\CollectionInterface $partido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Partido'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partido index large-9 medium-8 columns content">
    <h3><?= __('Partido') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_partido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partido as $partido): ?>
            <tr>
                <td><?= $this->Number->format($partido->id_partido) ?></td>
                <td><?= h($partido->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partido->id_partido]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partido->id_partido]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partido->id_partido], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->id_partido)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>
