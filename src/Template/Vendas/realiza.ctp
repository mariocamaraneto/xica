
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venda'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vendas index large-10 medium-8 columns content">
    <h3><?= __('Realizando Venda') ?></h3>



	<!-- 	INICIO - Caixa de pesquisa de produtos -->
    <div class='row'>
   		<?php echo $this->Form->create(null, ['type'=>'get', 'url' => false]);?>
			<div class='large-6 large-offset-4 columns'>
			    <!-- Pesquisa por nome do fornecedor -->
			    <?php 
			    	echo $this->Form->input('pesquisaProduto', ['type'=>'text',
			    			'label' => false,
			    			'placeholder' => 'Pesquise seu produto aqui',
			    	]);
			    ?>
		    </div>
		    <div class='large-2 columns end'>
			    <?php 
			    	echo $this->Form->button('Pesquisar', [
			    			'id'=>'pesquisarBtn', 
			    			'type' => 'button', 
			    			'class' => 'button tiny round'
			    	]);
			    ?>
		    </div>
		<?php echo $this->Form->end();?>
	</div>
	<!-- 	FIM - Caixa de pesquisa de produtos -->



    <table id='tableProdutos'>
        <thead>
            <tr>
            	<th>Ref</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id='listaDeProdutos'>
            <tr>
            </tr>
        </tbody>
    </table>
    
    
    <div class='row'>
	    <div class='large-4 large-offset-8 columns'>
	    	<ul class="pricing-table">
	  			<li class="title">Total da Venda</li>
	 		 	<li class="price" id="valorTotal">R$ 99.99</li>
	  		</ul>
	  	</div>
  	</div>
  	
  	<div id="saida"></div>
    
</div>

<?php echo $this->Html->script('jquery');?>
<?php echo $this->Html->script('venda'); ?>