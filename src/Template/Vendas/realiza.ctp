
<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Realizando Venda</h3>
		</div>	
</div>

<div class='row'>

	<!-- 	################ PRODUTOS #################### -->	
	<div class="vendas index large-8 large-offset-2 medium-8 columns">
	
		<!-- 	INICIO - Caixa de pesquisa de produtos -->
		<div class='row'>
	   			<?php	echo $this->Form->create ( null, [ 
								'url' => false,
								'id' => 'pesquisaProdutoForm',
								'autocomplete'=>"off",
						] );?>
				<div class='large-6 large-offset-4 columns'>
				<!-- Pesquisa por nome do produto -->
				    <?php echo $this->Form->input ( 'palavraPesquisaProduto', [ 
										'type' => 'text',
										'label' => false,
										'placeholder' => 'Pesquise seu produto aqui',
										'id' => 'palavraPesquisaProduto' 
								] );?>
			    </div>
				<div class='large-2 columns end'>
				    <?php echo $this->Form->button ( 'Pesquisar', [ 
										'type' => 'submit',
										'class' => 'button tiny round' 
								] );?>
			    </div>
			<?php echo $this->Form->end();?>
		</div>
		<!-- 	FIM - Caixa de pesquisa de produtos -->
	
		<table class='listProdutos' id='tableProdutos'>
			<thead>
				<tr>
					<th>Ref</th>
					<th>Nome</th>
					<th>Preço</th>
					<th></th>
				</tr>
			</thead>
			<tbody id='listaDeProdutos'>
				<!-- Aqui serão inseridos os produtos selecionados para venda -->
			</tbody>
		</table>
	
	</div>
	
	<!-- 	################ TOTAL #################### -->
	
	<div class='large-2 medium-3 columns' style='position: fixed; bottom: 10px; right:3%; background-color: white; z-index: 2;'>
		<div>
			<ul class="pricing-table">
				<li class="title">Total da Venda</li>
				<li class="price" id="valorTotal">R$ 0,00</li>
			</ul>
		</div>
		<div style='text-align: center; margin-top: 40px;'>
			<button type="button" class="round success button" onclick="finalizaVenda();">Finalizar</button>
		</div> 
	</div>

</div> <!-- FECHA ROW -->

<!-- 	################ MODAL #################### -->
<!-- INICIO - Painel suspenso que mostra os produtos resultados da pesquisa  -->
<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<span class="close" id="fecharModal">x</span>
		<table class="listEscolher" id='tableProdutos'>
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
		<div style="font-size: 0.8em;">
			<br><br>
			*Lembrando que nessa janela irão aparecer apenas os produtos que estão em estoque
		</div>
	</div>
</div>
<!-- FIM - Painel suspenso que mostra os produtos resultados da pesquisa  -->

<?php echo $this->Html->script('realizaVenda'); ?>
<?php echo $this->Html->script('jquery.redirect'); ?>
