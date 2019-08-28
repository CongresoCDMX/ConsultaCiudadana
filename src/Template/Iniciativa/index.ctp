<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iniciativa[]|\Cake\Collection\CollectionInterface $iniciativa
 */
?>

<div class="col-md-2 col col-lg-2">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nueva Iniciativa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista/Pagina'), ['action' => 'lista']) ?></li>
        <li><?= $this->Html->link(__('Iniciativa/Dictamenes'), ['action' => 'dictamenes']) ?></li>

    </ul>
</div>

<div class=" col-md-10 col-lg-10">
    <h3><?= __('Iniciativa') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('suscrita') ?></th>
                <th scope="col"><?= $this->Paginator->sort('partido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_turnado', ['label'=>'Turnado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_turnado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($iniciativa as $iniciativa): ?>
            <tr>
                <td><?= h($iniciativa['fecha']) ?></td>
                <td><?= h($iniciativa['tipo']) ?></td>
                <td><?= h($iniciativa['nom_suscrita']) ?></td>
                <td><?= h($iniciativa['nom_partido']) ?></td>
                <td><?= h($iniciativa['nom_turnado']) ?></td>
                <td><?= h($iniciativa['segundo_turnado']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Dictamen'), ['controller'=>'dictamen', 'action' => 'add', $iniciativa['id_iniciativa']]) ?>
                    <?= $this->Html->link(__('Comentarios'), ['controller'=>'comentarios', 'action' => 'index', $iniciativa['id_iniciativa']]) ?>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $iniciativa['id_iniciativa']]) ?>
                    <?= $this->Html->link(__('Vista/Pagina'), ['action' => 'vista', $iniciativa['id_iniciativa']]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $iniciativa['id_iniciativa']]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $iniciativa['id_iniciativa']], ['confirm' => __('Are you sure you want to delete # {0}?', $iniciativa['id_iniciativa'])]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->DataTables->setJs() ?>

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


