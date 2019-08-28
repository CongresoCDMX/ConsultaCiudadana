<nav class="large-2 medium-2 small-1  columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Lista de Iniciativas'), ['action' => 'lista']) ?> </li>
    </ul> 
</nav>
<div class="iniciativa view large-11 medium-10 columns content">
<h3>Fecha de cierre:
<?php
echo h($iniciativa['fecha_cierre']);
?>

</h3>
<table class="table table-striped">
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

<!--	<tr>
                <th scope="row"><?= __('Fecha de final') ?></th>
                 <td><?= h($iniciativa['fecha_cierre']) ?></td>
    	</tr> -->

    </table>

      <div class="row">
        <h4><?= __('Adhieren') ?></h4>
                              <?php if (!empty($adheridos)):  ?>

                              <ul>
                                      <?php
                                      foreach($adheridos as $adherido){
                              echo "<li>".$adherido->nom_autor."</li>";
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
        <h4><?= __('Archivo Adjunto') ?></h4>
          <!-- <a href="<?= html_entity_decode(h($iniciativa['archivo_consulta'])) ?>" download>Consultar</a> -->

       <!--  <?php echo $this->Html->link('Consultar iniciativa',"/webroot/img/".h($iniciativa['archivo_consulta']))  ?> -->
         <?= $this->Form->button(__($this->Html->link('Consultar iniciativa',"/webroot/img/".h($iniciativa['archivo_consulta'])) )) ?>

        <?php
       // echo $this->Html->link('Consultar', ['action' => 'download', $iniciativa['archivo_consulta']]);
        ?>

    </div>

<!-- Comentarios -->
<div <?php if (h($iniciativa['fecha_cierre']) < date("d/m/Y")){ echo 'style="display:none;"'; } ?>>
    <?= $this->Form->create($comentario) ?>
        <fieldset>
	        <legend><?= __('Añade un comentario') ?></legend>
		        <?php
                   echo $this->Form->control('id_iniciativa',['type' => 'hidden', 'value'=>$iniciativa['id_iniciativa']]);
                   echo $this->Form->control('correo');
                   echo $this->Form->control('me_gusta');
                   echo $this->Form->control('no_gusta',['label'=>'No me gusta']);
	               echo $this->Form->control('comentario');
			       echo $this->Form->control('archivo',['type'=>'file']);
	            ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>

</div>
<script>
