<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$sysDescription = 'Sistema Brechó da Xica';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $sysDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('estilo.css')?>

	<?php echo $this->Html->script('jquery');?>
	<?php echo $this->Html->script('main');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">

        <div class="top-bar-section">
        	<ul class='barra-superior'>
        		<li>
        			<?php  echo $this->Html->link('Funcionarios', [
							   						'controller' => 'Funcionarios', 
							  						'action' => 'index',
							  						'_full' => true,
  													]
								); ?>
        		</li>
        		<li>
        			<?php  echo $this->Html->link('Clientes', [
							        				'controller' => 'Clientes',
							        				'action' => 'index',
							        				'_full' => true,
        											]
        						); ?>
        		</li>
        		<li>
        			<?php  echo $this->Html->link('Vendas', [
							        				'controller' => 'Vendas',
							        				'action' => 'realiza',
							        				'_full' => true,
        											]
        						); ?>
        		</li>
        		<li>
        			<?php  echo $this->Html->link('Produtos', [
							        				'controller' => 'Produtos',
							        				'action' => 'index',
							        				'_full' => true,
        											]
        						); ?>
        		</li>
        		<li>
        			<?php  echo $this->Html->link('Fornecedores', [
							        				'controller' => 'Fornecedores',
							        				'action' => 'index',
							        				'_full' => true,
        											]
        						); ?>
        		</li>
        		<li>
        			<?php  echo $this->Html->link('Pagamentos', [
							        				'controller' => 'Pagamentos',
							        				'action' => 'realiza',
							        				'_full' => true,
        											]
        						); ?>
        		</li>
        	</ul>
        
            <ul class="botao-sair">
               	<li><a class="botao-sair" href="funcionarios/logout">Sair</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
