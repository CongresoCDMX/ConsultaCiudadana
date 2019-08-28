<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estatus[]|\Cake\Collection\CollectionInterface $estatus
 */
?>
<div class="col-md-2 col-lg-2" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nuevo Estatus'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="estatus col-md-10 col-lg-10">
    <h3><?= __('Estatus') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_estatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estatus') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estatus as $estatus): ?>
            <tr>
                <td><?= $this->Number->format($estatus->id_estatus) ?></td>
                <td><?= h($estatus->estatus) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $estatus->id_estatus]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $estatus->id_estatus]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $estatus->id_estatus], ['confirm' => __('Are you sure you want to delete # {0}?', $estatus->id_estatus)]) ?>
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