<div
	class="vendas index large-9 large-offset-2 medium-8 columns content">
	<h3><?= __('Finalizando Venda') ?></h3>


	<!-- 	INICIO - Caixa de pesquisa de clientes -->
	<div class='row'>
   			<?php	echo $this->Form->create ( null, [ 
							'url' => false,
							'id' => 'pesquisaClienteForm',
							'autocomplete'=>"off",
					] );
					?>
			<div class='large-8 large-offset-1 columns'>
			<!-- Pesquisa por nome do cliente -->
			    <?php
							echo $this->Form->input ( 'palavraPesquisaCliente', [ 
									'type' => 'text',
									'label' => 'Digite o nome do cliente',
									'placeholder' => 'Pesquise o cliente aqui',
									'id' => 'palavraPesquisaCliente' 
							] );
							?>
		    </div>
			<div class='large-2 columns'>
			    <?php
							echo $this->Form->button ( 'Pesquisar', [ 
									'type' => 'submit',
									'class' => 'button tiny round' 
							] );
							?>
		    </div>
		    <div class='large-1 columns end' >
		    	<button class="button alert tiny round" type="button" 
		    		style="display: none;" id="removerCliente">Remover</button>
		    </div>
		<?php echo $this->Form->end();?>
	</div>
	<!-- 	FIM - Caixa de pesquisa de clientes -->



	<div class='row'>
   			<?php	echo $this->Form->create ( null, [ 
							'url' => false,
							'id' => 'descontoForm',
							'autocomplete'=>"off",
					] );
					?>
			<div  class='large-4 large-offset-3 columns'>
				<p>Digite o desconto nessa compra <strong>R$</strong></p>
			</div>
			<div class='large-2 columns end'>
			<!-- Pesquisa por nome do cliente -->
			    <?php
							echo $this->Form->input ( 'valorDesconto', [ 
									'type' => 'number',
									'step' => '0.01',
									'min' => "0",
									'value' => '0.00',
									'label' => false,
									'id' => 'valorDesconto', 
							] );
							?>
		    </div>
		<?php echo $this->Form->end();?>
	</div>
	
	
	
	<div class='row'>
		<div class='large-3 large-offset-3 columns'>
			Escolha a forma de pagamento
		</div>
		<div class='large-3 columns end'>
			<select id="formaPagamento">
			  <option>Dinheiro</option>
			  <option>Cartão</option>
			  <option>Cheque</option>
			</select>
		</div>
	</div> 
			


	<div class='row'>
	
		<div class='large-4 large-offset-8 columns'>
			<ul class="pricing-table">
				<li class="title">Total da Venda</li>
				<li class="price" id="valorTotal"><?php echo $this->Number->currency($total)?></li>
			</ul>
		</div>
	</div>

</div>




<!-- INICIO - Painel suspenso que mostra os produtos resultados da pesquisa  -->
	<div id="myModal" class="modal">
	
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close" id="fecharModal">x</span>
			<table id='tableClientes'>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody id='listaDeClientesModal'>
					<!-- A lista de produtos será inserido aqui -->
				</tbody>
			</table>
		</div>
	
	</div>
<!-- FIM - Painel suspenso que mostra os produtos resultados da pesquisa  -->


<?php echo $this->Html->script('finalizaVenda'); ?>