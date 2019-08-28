<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iniciativa[]|\Cake\Collection\CollectionInterface $iniciativa
 */
?>
<div class="iniciativa index large-12 medium-12 columns content">
    <h3><?= __('Iniciativas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo', ['label'=>'Ley']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('suscrita', ['label'=>'Propone']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_turnado', ['label'=>'Comisión Dictaminadora']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_estatus', ['label'=>'Estatus']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('arc_dictamen', ['label'=>'Dictamen']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('url_dic', ['label'=>'Gaceta']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($iniciativa as $iniciativa): ?>
            <tr>
                <td><?= h($iniciativa['fecha']) ?></td>
                <td><?= h($iniciativa['tipo']) ?></td>
                <td><?= h($iniciativa['nombre']) ?></td>
                <td><?= h($iniciativa['nom_suscrita']) ?> <?php echo "<br><br>" ?> <?= h($iniciativa['nom_partido']) ?></td>
                <td><?= h($iniciativa['nom_turnado']) ?></td>
                <td><?= h($iniciativa['nom_estatus']) ?></td>
                <td><?= h($iniciativa['arc_dictamen']) ?></td>
                <td><?= html_entity_decode(h($iniciativa['url_dic'])) ?></td>

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
