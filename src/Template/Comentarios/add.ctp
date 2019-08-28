<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="comentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($comentario) ?>
    <fieldset>
        <legend><?= __('Add Comentario') ?></legend>
        <?php
            echo $this->Form->control('id_iniciativa');
            echo $this->Form->control('correo');
            echo $this->Form->control('comentario');
            echo $this->Form->control('archivo');
            echo $this->Form->control('me_gusta');
            echo $this->Form->control('no_gusta');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
