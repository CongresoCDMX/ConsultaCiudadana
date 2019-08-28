<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turnado[]|\Cake\Collection\CollectionInterface $turnado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Turnado'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="turnado index large-9 medium-8 columns content">
    <h3><?= __('Turnado') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_turnado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($turnado as $turnado): ?>
            <tr>
                <td><?= $this->Number->format($turnado->id_turnado) ?></td>
                <td><?= h($turnado->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $turnado->id_turnado]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turnado->id_turnado]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $turnado->id_turnado], ['confirm' => __('Are you sure you want to delete # {0}?', $turnado->id_turnado)]) ?>
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
