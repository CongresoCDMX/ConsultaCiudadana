<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Consulta Ciudadana';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script([
        	'*PATH*/jquery.min.js',
        	'*PATH*/jquery.dataTables.min.js',
        	'*PATH*/dataTables.bootstrap.min.js', // optional
        	'DataTables.cakephp.dataTables.js',
        ]) ?>
    <?= $this->Html->css('*PATH*/dataTables.bootstrap.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->CKEditor->loadJs(); ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
	    <h1 style='color: white;'><b> Administrador Consulta Ciudadana</b></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
	      <li><?= $this->Html->link('Estatus', ['controller'=> 'Estatus', 'action' => 'index']); ?> </li>
          <li><?= $this->Html->link('Partido', ['controller'=> 'Partido', 'action' => 'index']); ?> </li>
	      <li><?= $this->Html->link('Diputados', ['controller'=> 'Diputado', 'action' => 'index']); ?> </li>
	      <li><?= $this->Html->link('Iniciativa', ['controller' => 'Iniciativa', 'action'=> 'index']);?> </li> 
	      <li><?= $this->Html->link('Comentarios', ['controller' => 'Reportes', 'action'=> 'index']);?> </li>
	      <li><?= $this->Html->link('Comisiones', ['controller' => 'Turnado', 'action' => 'index']);  ?></li>
	      <li><?= $this->Html->link('Usuarios', ['controller' => 'Users', 'action' => 'index']);  ?></li> 
	      <li><?= $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']); ?></li>	
           </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
