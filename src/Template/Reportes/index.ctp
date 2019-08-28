<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario[]|\Cake\Collection\CollectionInterface $comentarios
 */
?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>


<div class="comentarios index large-12 medium-12 columns content">
    <h3><?= __('Reporte de Comentarios') ?></h3>
    <p>Selecciona el mes: <input type="text" id="datepicker" style="width:130px;"></p>
    <input type="button" value="Consultar">
        <br><br><br>

   <button> <?= $this->Html->link(('Exportar a PDF'), ['action' => 'index', '_ext' => 'pdf']); ?> </button>
   <button onclick="myFunction()">Imprimir</button>


<br><br><br>
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_iniciativa', ['label'=>'Iniciativa']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('correo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comentario') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comentarios as $comentario): ?>
            <tr>
                <td><?= h($comentario['nom_iniciativa']) ?></td>
                <td><?= h($comentario['correo']) ?></td>
                <td><?= h($comentario['comentario']) ?></td>
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
<script>
function myFunction() {
  window.print("table");
}
</script>