<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!--
<?= $this->Form->create("",['type'=>'get']) ?>
<?= $this->Form->control('keyword'); ?>
<button style="height: 30px;">Buscar</button>
<?= $this->Form->end() ?> -->

<div class="iniciativa index large-12 medium-12 small-12 columns content">
    <h3><?= __('Proposiciones') ?></h3>
<table class="table table-striped">
        <thead>
            <tr>
		<th style="width:80px"  scope="col"><?= $this->Paginator->sort('fecha') ?></th>
		<th style="width:600px" scope="col"><?= $this->Paginator->sort('nombre') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proposicion as $proposicion): ?>
            <tr>
                <td><?= h($proposicion->fecha_publicacion) ?></td>
	<!--	<td><?= h($proposicion->nombre) ?></td> -->
	        <td><?= $this->Html->link(__(h($proposicion->nombre)), ['action' => 'ver', $proposicion->id_proposicion]) ?></td>
              <!-- <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'vista', $iniciativa->id_iniciativa]) ?>
		</td> -->
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
<style>
a{
color: #722b37;
}

a:hover{
color: #b4872c;
}
</style>
<script>
$(document).ready( function () {
            $('#table_id').DataTable();
        } );
</script>