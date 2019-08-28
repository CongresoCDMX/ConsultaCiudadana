<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proposicion $proposicion
 */
?>
<div class="col-md-2 col-lg-2" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Proposicion'), ['action' => 'edit', $proposicion->id_proposicion]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proposicion'), ['action' => 'delete', $proposicion->id_proposicion], ['confirm' => __('Are you sure you want to delete # {0}?', $proposicion->id_proposicion)]) ?> </li>
        <li><?= $this->Html->link(__('List Proposicion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proposicion'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="col-md-10 col-lg-10" id="actions-sidebar">
    <h3><?= h($proposicion->id_proposicion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Legislatura') ?></th>
            <td><?= h($proposicion->legislatura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Año') ?></th>
            <td><?= h($proposicion->año) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Periodo') ?></th>
            <td><?= h($proposicion->periodo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Proposicion') ?></th>
            <td><?= $this->Number->format($proposicion->id_proposicion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Orden') ?></th>
            <td><?= $this->Number->format($proposicion->no_orden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Publicacion') ?></th>
            <td><?= h($proposicion->fecha_publicacion) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($proposicion->nombre)); ?>
    </div>
        <div class="row">
            <h4><?= __('Autores') ?></h4>
                                  <?php if (!empty($autores)):  ?>

                                  <ul>
                                          <?php
                                          foreach($autores as $autor){
                                  echo "<li>".$autor->nombre_diputado."</li>";
                                          }
                                          ?>
                                      </ul>
                                  <?php endif; ?>
           </div>
</div>
