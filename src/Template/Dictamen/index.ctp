<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dictaman[]|\Cake\Collection\CollectionInterface $dictamen
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista de Iniciativas'), ['controller'=>'Iniciativa','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dictamen index large-9 medium-8 columns content">
    <h3><?= __('Dictamen') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_dictamen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_iniciativa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_estatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dictamen') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dictamen as $dictaman): ?>
            <tr>
                <td><?= $this->Number->format($dictaman->id_dictamen) ?></td>
                <td><?= $this->Number->format($dictaman->id_iniciativa) ?></td>
                <td><?= $this->Number->format($dictaman->id_estatus) ?></td>
                <td><?= h($dictaman->dictamen) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dictaman->id_dictamen]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dictaman->id_dictamen]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dictaman->id_dictamen], ['confirm' => __('Are you sure you want to delete # {0}?', $dictaman->id_dictamen)]) ?>
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
