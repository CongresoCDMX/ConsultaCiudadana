<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IniciativaDiputado[]|\Cake\Collection\CollectionInterface $iniciativaDiputados
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Iniciativa Diputado'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="iniciativaDiputados index large-9 medium-8 columns content">
    <h3><?= __('Iniciativa Diputados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_iniciativa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_diputado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($iniciativaDiputados as $iniciativaDiputado): ?>
            <tr>
                <td><?= $this->Number->format($iniciativaDiputado->id) ?></td>
                <td><?= $this->Number->format($iniciativaDiputado->id_iniciativa) ?></td>
                <td><?= $this->Number->format($iniciativaDiputado->id_diputado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $iniciativaDiputado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $iniciativaDiputado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $iniciativaDiputado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iniciativaDiputado->id)]) ?>
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
