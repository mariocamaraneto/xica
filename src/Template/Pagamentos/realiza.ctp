<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Realizando Pagamento</h3>
		</div>	
</div>

<div class="vendas index large-8 large-offset-2 medium-10 medium-offset-1 columns">

	<!-- 	INICIO - Caixa de pesquisa de fornecedores -->
	<div class='row'>
   			<?php	echo $this->Form->create ( null, [ 
							'url' => false,
							'id' => 'pesquisaFornecedorForm',
							'autocomplete'=>"off",
					] ); ?>
			<div class='large-6 large-offset-4 columns'>
			<!-- Pesquisa por nome do produto -->
			    <?php echo $this->Form->input ( 'palavraPesquisaFornecedor', [ 
									'type' => 'text',
									'label' => false,
									'placeholder' => 'Pesquise o fornecedor aqui',
									'id' => 'palavraPesquisaFornecedor' 
							] ); ?>
		    </div>
		<div class='large-2 columns end'>
			    <?php echo $this->Form->button ( 'Pesquisar', [ 
									'type' => 'submit',
									'class' => 'button tiny round' 
							] ); ?>
		    </div>
		<?php echo $this->Form->end();?>
	</div>
	<!-- 	FIM - Caixa de pesquisa de produtos -->


	<table id='tableProdutos'>
		<thead>
			<tr>
				<th>Ref.</th>
				<th>Nome</th>
				<th>Preço custo</th>
			</tr>
		</thead>
		<tbody id='listaDeProdutos'>
			<!-- Aqui serão inseridos os produtos a serem pagos ao fornecedor -->
		</tbody>
	</table>


	<div class='row'>
		<div class='large-3 large-offset-1 columns'>
	   		<button class='button round success' type="button" onclick="realizarPagamento();">Realizar Pagamento</button> 
		</div>
		<div class='large-4 large-offset-4 columns'>
			<ul class="pricing-table">
				<li class="title">Total a pagar</li>
				<li class="price" id="valorTotal">R$0,00</li>
			</ul>
		</div>
	</div>
</div>


<!-- INICIO - Painel suspenso que mostra os produtos resultados da pesquisa  -->
	<div id="myModal" class="modal">
	
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close" id="fecharModal">x</span>
			<table id='tableFornecedores'>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody id='listaDeForncedoresModal'>
					<!-- A lista de fornecedores será inserido aqui -->
				</tbody>
			</table>
		</div>
	</div>
<!-- FIM - Painel suspenso que mostra os produtos resultados da pesquisa  -->

 <?php echo $this->Html->script('realizaPagamento'); ?>
 <?php echo $this->Html->script('jquery.redirect'); ?>
