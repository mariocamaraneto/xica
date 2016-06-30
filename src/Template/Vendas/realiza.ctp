
<div class="vendas index large-9 large-offset-2 medium-8 columns content">
    <h3><?= __('Realizando Venda') ?></h3>



	<!-- 	INICIO - Caixa de pesquisa de produtos -->
    <div class='row'>
   		<?php echo $this->Form->create(null, [
   				'url' => false, 
   				'id' => 'pesquisaProdutoForm'
   		]);?>
			<div class='large-6 large-offset-4 columns'>
			    <!-- Pesquisa por nome do fornecedor -->
			    <?php 
			    	echo $this->Form->input('palavraPesquisaProduto', [
			    			'type'=>'text',
			    			'label' => false,
			    			'placeholder' => 'Pesquise seu produto aqui',
			    			'id' => 'palavraPesquisaProduto'
			    	]);
			    ?>
		    </div>
		    <div class='large-2 columns end'>
			    <?php 
			    	echo $this->Form->button('Pesquisar', [
			    			'type' => 'submit', 
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
			<!-- Aqui serão inseridos os produtos selecionados para venda -->
        </tbody>
    </table>
    
    
    <div class='row'>
	    <div class='large-4 large-offset-8 columns'>
	    	<ul class="pricing-table">
	  			<li class="title">Total da Venda</li>
	 		 	<li class="price" id="valorTotal">R$ 0,00</li>
	  		</ul>
	  	</div>
  	</div>
  	
  	<div id="saida"></div>
    
</div>



<!-- The Modal - Painel suspenso que mostra os produtos resultados da pesquisa  -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">x</span>
        <table id='tableProdutos'>
        <thead>
            <tr>
            	<th>Ref</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody id='listaDeProdutosModal'>
			<!-- A lista de produtos será inserido aqui -->
        </tbody>
    </table>
  </div>

</div>

<?php echo $this->Html->script('jquery');?>
<?php echo $this->Html->script('venda'); ?>