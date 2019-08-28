<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dictaman $dictaman
 */
?>
<?= $this->Html->script('upload3') ?>
<?= $this->Html->script('ShowImagePreview') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista de Dictamen'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dictamen form large-9 medium-8 columns content">
    <?= $this->Form->create($dictaman, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Agregar Dictamen') ?></legend>
        <?php

            echo $this->Form->control('id_iniciativa',['type' => 'hidden', 'value'=>$iniciativa->id_iniciativa]);
            echo $this->Form->control('id_estatus',['type' => 'select',
                        'options' => $estatus,
                        'empty' => 'selecciona']);

            echo $this->Form->control('dictamen', ['type' => 'file']);
            echo $this->Form->control('url');
            echo $this->CKEditor->replace('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
