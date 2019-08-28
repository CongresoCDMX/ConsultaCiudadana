<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dictaman $dictaman
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dictaman->id_dictamen],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dictaman->id_dictamen)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dictamen'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dictamen form large-9 medium-8 columns content">
    <?= $this->Form->create($dictaman) ?>
    <fieldset>
        <legend><?= __('Edit Dictaman') ?></legend>
        <?php
            echo $this->Form->control('id_iniciativa');
            echo $this->Form->control('id_estatus');
            echo $this->Form->control('dictamen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
