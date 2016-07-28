<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Finalizando de Venda</h3>
		</div>	
</div>

<div class="vendas index large-8 large-offset-2 medium-11 columns">

	<!-- 	INICIO - Caixa de pesquisa de clientes -->
	<div class='row'>
   			<?php	echo $this->Form->create ( null, [ 
							'url' => false,
							'id' => 'pesquisaClienteForm',
							'autocomplete'=>"off",
					] );
					?>
			<div class='large-8 large-offset-1 medium-8 medium-offset-2 columns'>
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
			<div class='large-2 medium-2 columns'>
			    <?php
							echo $this->Form->button ( 'Pesquisar', [ 
									'type' => 'submit',
									'class' => 'button tiny round info',
									'style' => 'margin-top: 20px;',
							] );
							?>
		    </div>
		    <div class='large-1 medium-2 columns end' >
		    	<button class="button alert tiny round" type="button" 
		    		style="display: none; margin-top: 20px; " id="removerCliente">Remover</button>
		    </div>
		<?php echo $this->Form->end();?>
	</div>
	<!-- 	FIM - Caixa de pesquisa de clientes -->



	<div class='row' style="margin-top: 1em;">
   			<?php	echo $this->Form->create ( null, [ 
							'url' => false,
							'id' => 'descontoForm',
							'autocomplete'=>"off",
					] );?>
					
			<div  class='large-4 large-offset-3 medium-5 medium-offset-2 columns'>
				<p>Digite o desconto nessa compra <strong>R$</strong></p>
			</div>
			
			<div class='large-2 medium-3 columns end'>
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
	
	
	<div class='row' style="margin-top: 1em;">
		<div class='large-3 large-offset-3 medium-5 medium-offset-2 columns'>
			Escolha a forma de pagamento
		</div>
		<div class='large-3 medium-3 columns end'>
			<select id="formaPagamento">
			  <option>Dinheiro</option>
			  <option>Prazo</option>
			  <option>Cartão</option>
			  <option>Cheque</option>
			</select>
		</div>
	</div>
	
	<div class='row' id="parcelas">
		<div class='large-3 large-offset-3 columns'>
			Número de parcelas
		</div>
		<div class='large-2 large-offset-1 columns end'>
				<?php echo $this->Form->input ( 'numeroparcelas', [ 
								'type' => 'number',
								'label' => '',
								'min' =>'1',
								'value' => '1',
						] );?>
		</div>
	</div>
			
		<?php echo $this->Form->end();?>
	</div>
	

	<div class='row' style="margin-top: 4em;">
		<div class='large-4 large-offset-1 medium-4 medium-offset-2 end columns'>
			<ul class="pricing-table">
				<li class="title">Total da Venda</li>
				<li class="price" id="valorTotal"><?php echo $this->Number->currency($subtotal)?></li>
			</ul>
		</div>
		<div class='large-3 large-offset-2 medium-4 columns'>
				<button id="concluiVenda" class='button medium round' >Concluir Venda</button>
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
<?php echo $this->Html->script('jquery.redirect'); ?>