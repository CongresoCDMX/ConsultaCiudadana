<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diputado[]|\Cake\Collection\CollectionInterface $diputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Diputado'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diputado index large-9 medium-8 columns content">
    <h3><?= __('Diputado') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_partido') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diputado as $diputado): ?>
            <tr>
                <td><?= h($diputado['nombre']) ?></td>
                <td><?= h($diputado['nom_partido']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $diputado['id_diputado']]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $diputado['id_diputado']]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $diputado['id_diputado']], ['confirm' => __('Are you sure you want to delete # {0}?', $diputado['id_diputado'])]) ?>
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
