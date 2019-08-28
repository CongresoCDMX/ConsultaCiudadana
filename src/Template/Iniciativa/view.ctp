<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Iniciativa $iniciativa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Iniciativa'), ['action' => 'edit', $iniciativa['id_iniciativa']]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Iniciativa'), ['action' => 'delete', $iniciativa['id_iniciativa']], ['confirm' => __('Are you sure you want to delete # {0}?', $iniciativa['id_iniciativa'])]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Iniciativa'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Iniciativa'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="iniciativa view large-9 medium-8 columns content">
<h3>Días restantes:
<?php
$fecha_cierre = strtotime(h($iniciativa['fecha_cierre']));
//$fecha_inicio = strtotime(h($iniciativa['fecha']));

$fecha_actual = strtotime("now");
//echo $fecha_actual."hola";


$dif =  $fecha_cierre-$fecha_actual;
$diff = floor($dif/(60*60*24));
//echo $diff;
if($diff < 0){
	echo 0;
}else{
	print $diff;
}
?>

</h3>
    <table class="vertical-table">
	<tr>
		<th scope="row"><?= ('Nombre') ?></th>
                <td><?= h($iniciativa['nombre']); ?></td>
        </tr>


	<tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($iniciativa['tipo']); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turnado') ?></th>
            <td><?= h($iniciativa['nom_turnado']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suscrita') ?></th>
            <td><?= h($iniciativa['nom_suscrita']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Partido') ?></th>
            <td><?= h($iniciativa['nom_partido']) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Fecha de Inicio') ?></th>
             <td><?= h($iniciativa['fecha']) ?></td>
	</tr>
    </table>

      <div class="row">
        <h4><?= __('Adhieren') ?></h4>
                              <?php if (!empty($adheridos)):  ?>

                              <ul>
                                      <?php
                                      foreach($adheridos as $adherido){
                              echo "<li>".$adherido->nom_adherido."</li>";
                                      }
                                      ?>
                                  </ul>
                              <?php endif; ?>
       </div>
    <div class="row">
        <h4><?= __('Ley') ?></h4>
        <?= h($iniciativa['ley']); ?>
    </div>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= h($iniciativa['nombre']) ?>
    </div>
    <div class="row">
        <h4><?= __('Dice') ?></h4>
        <?= h($iniciativa['dice']) ?>
    </div>
    <div class="row">
        <h4><?= __('Propuesta') ?></h4>
        <?= h($iniciativa['propuesta']) ?>
    </div>
    <div class="row">
        <h4><?= __('Consulta') ?></h4>
        <?= html_entity_decode(h($iniciativa['consulta'])) ?>
    </div>
    <div class="row">
        <h4><?= __('Archivo de descarga') ?></h4>
         <?= h($iniciativa['archivo_consulta']) ?>
         <a href="/webroot/img".<?= h($iniciativa['archivo_consulta']) ?>." download>Descargar</a>
        <?php
       // echo $this->Html->link('Descargar', ['action' => 'download', $iniciativa['archivo_consulta']]);
        ?>

    </div>



    </div>

