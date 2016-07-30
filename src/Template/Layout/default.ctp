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
    <?= $this->Html->charset()?>
    <meta name="viewport"
	content="width=device-width, initial-scale=1.0">
<title>
        <?= $sysDescription ?>:
        <?= $this->fetch('title')?>
    </title>

<!-- tempo para recarregar a página e ir para tela de login -->
    <?php
				use Cake\Core\Configure;
				$timeSec = Configure::read ( 'Session' ) ['timeout'] * 60 + 10;
				?>
	 <meta http-equiv="refresh" content="<?= $timeSec ?>" />
	 
	 
    <?= $this->Html->meta('icon')?>

    <?= $this->Html->css('estilo.css')?>
    <?= $this->Html->css('base.css')?>
    <?= $this->Html->css('cake.css')?>
    

	<?php echo $this->Html->script('jquery');?>
	<?php echo $this->Html->script('jquery.maskedinput.min.js'); ?>
	<?php echo $this->Html->script('main');?>
	
	<script src="/webroot/zurb5/js/vendor/jquery.js"></script>
  	<script src="/webroot/zurb5/js/foundation/foundation.js"></script>
  	<script src="/webroot/zurb5/js/foundation/foundation.topbar.js"></script>

    <?= $this->fetch('meta')?>
    <?= $this->fetch('css')?>
    <?= $this->fetch('script')?>
</head>
<body>
	<nav class="top-bar expanded" data-topbar role="navigation">


		<ul class="title-area">
			<li class="name bordaLogo">
				<h1 id="nomeLogo"><a href='/pages/home'>Brechó da XICA</a></h1>
			</li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>


		<div class="top-bar-section">

			<ul class="left">
				<li class="has-dropdown"><a href="/funcionarios">Funcionários</a>
					<ul class="dropdown">
						<li><a href="/funcionarios/add">Cadastrar</a></li>
						<li><a href="/funcionarios">Listar</a></li>
					</ul>
				</li>
				<li class="has-dropdown"><a href="/clientes">Clientes</a>
					<ul class="dropdown">
						<li><a href="/clientes/add">Cadastrar</a></li>
						<li><a href="/clientes">Listar</a></li>
					</ul>
				</li>
				<li class="has-dropdown"><a href="/produtos">Produtos</a>
					<ul class="dropdown">
						<li><a href="/produtos/add">Cadastrar</a></li>
						<li><a href="/produtos">Em Estoque</a></li>
						<li><a href="/produtos/listforaestoque">Fora de Estoque</a></li>
					</ul>
				</li>
				<li class="has-dropdown"><a href="/fornecedores">Fornecedoras</a>
					<ul class="dropdown">
						<li><a href="/fornecedores/add">Cadastrar</a></li>
						<li><a href="/fornecedores">Listar</a></li>
					</ul>
				</li>
				<li class="has-dropdown"><a href="/vendas/realiza">Vendas</a>
					<ul class="dropdown">
						<li><a href="/vendas/realiza">Realizar</a></li>
						<li><a href="/vendas">Listar</a></li>
						<li><a href="/vendas/listcanceladas">Canceladas</a></li>
					</ul>
				</li>
				<li class="has-dropdown"><a href="/pagamentos/realiza">Pagamentos</a>
					<ul class="dropdown">
						<li><a href="/pagamentos/realiza">Realizar</a></li>
						<li><a href="/pagamentos">Listar</a></li>
					</ul>
				</li>
				<li class="has-dropdown"><a href="/recebimentos/realiza">Recebimento</a>
					<ul class="dropdown">
						<li><a href="/recebimentos/realiza">Realiza</a></li>
						<li><a href="/recebimentos">Listar</a></li>
					</ul>
				</li>
				<li><a href="/pages/relatorios">Relatórios</a>
				</li>

			</ul>


			<ul class="right">
				<li><a href="/funcionarios/logout">Sair</a></li>
			</ul>
		</div>
	</nav>
    <?= $this->Flash->render()?>
    <?= $this->Flash->render('auth')?>
    <div class="clearfix" style='height: auto; overflow:hidden; margin-top:30px; width:100%'>
        <?= $this->fetch('content')?>
    </div>
    
    
    
	<!--     Incializa ZURB5 -->
	 <script>
	    $(document).foundation();
	  </script>
 
</body>
</html>
