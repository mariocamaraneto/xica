
<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Realiza Recebimento</h3>
		</div>	
</div>

<div class='row'>

	<div class="vendas index large-8 large-offset-2 medium-8 columns">
	
		<!-- 	INICIO - Caixa de pesquisa de Clientes -->
		<div class='row'>
	   			<?php	echo $this->Form->create ( null, [ 
								'url' => false,
								'id' => 'pesquisaClienteForm',
								'autocomplete'=>"off",
						] );?>
				<div class='large-6 large-offset-4 columns'>
				<!-- Pesquisa por nome do Cliente -->
				    <?php echo $this->Form->input ( 'palavraPesquisaCliente', [ 
										'type' => 'text',
										'label' => false,
										'placeholder' => 'Pesquise o cliente aqui',
										'id' => 'palavraPesquisaCliente' 
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
		<!-- 	FIM - Caixa de pesquisa de clientes -->
	
	<!-- 	################ PARCELAS #################### -->	
		<table class='listParcelas' id='tableParcelas'>
			<thead>
				<tr>
					<th>Data Compra</th>
					<th>Vencimento</th>
					<th>Valor</th>
					<th>Num Parcela</th>
				</tr>
			</thead>
			<tbody id='listaDeParcelas'>
				<!-- Aqui serão inseridos as Parcelasdo cliente -->
			</tbody>
		</table>
	
	</div>
	
	<!-- 	################ TOTAL #################### -->
	
	<div class='large-2 medium-3 columns' id='caixaTotalRecebimento' class='caixaTotalRecebimento'>
		<?php	echo $this->Form->create ( null, [ 
							'url' => '/recebimentos/realiza',
							'id' => 'pagamentoForm',
							'autocomplete'=>"off",
					] );?>
			
			<?php
				//guarda informações do cliente que esta realizando o pagamento
				echo $this->Form->input('idcliente', ['style'=>'display: none;','label'=>'']); 
			?>
			<div>
				<ul class="pricing-table">
					<li class="title">Total das Parcelas</li>
					<li class="price" id="valorTotal">R$ 0,00</li>
				</ul>
			</div>
			<div class='row'>
				<div class='large-10 large-offset-1 columns'>
					<?php echo $this->Form->input('valor',[
							'placeholder'=>'Digite o valor a ser pago',
							'label'=>'Valor do Pagamento',
							'type' => 'text',
					]);?>
							
				</div>
			</div>
			<div>
				<?php echo $this->Form->select('formapagamento', ['Dinheiro'=>'Dinheiro', 'Cartão'=>'Cartão', 'Cheque'=>'Cheque']); ?>
			</div>
			<div>
				<?php echo $this->Form->button ( 'Pagar', [ 
										'type' => 'submit',
										'class' => 'button success round',
										'confirm' => 'Confirma o pagamento?',
										'onclick' => "if(!confirm('Confirma o Pagamento?')) return false;"
								] );?>
			</div> 
		<?php echo $this->Form->end();?>
	</div>

</div> <!-- FECHA ROW CORPO DA PAGINA-->

<!-- 	################ MODAL #################### -->
<!-- INICIO - Painel suspenso que mostra os clientes resultados da pesquisa  -->
<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<span class="close" id="fecharModal">x</span>
		<table class="listEscolher" id='tableClientes'>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Telefone</th>
				</tr>
			</thead>
			<tbody id='listaDeClientesModal'>
				<!-- A lista de clientes será inserido aqui -->
			</tbody>
		</table>
	</div>
</div>
<!-- FIM - Painel suspenso que mostra os clientes resultados da pesquisa  -->

<?php echo $this->Html->script('jquery.maskMoney.min')?>
<?php echo $this->Html->script('jquery.redirect'); ?>
<?php echo $this->Html->script('jquery.dateFormat.min.js'); ?>
<?php echo $this->Html->script('realizaRecebimento'); ?>
