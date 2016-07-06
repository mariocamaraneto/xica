<div
	class="pagamentos index large-9 large-offset-2 medium-8 columns content">
	<h3><?= __('Finalizando Pagamento') ?></h3>


	<!-- 	INICIO - Caixa de pesquisa de clientes -->
	<div class='row'>

			<div class='large-8 large-offset-3 columns'>
			<!-- Mostra nome do fornecedor -->
				<span class="secondary radius label" style="font-size: 1.5em; line-height: 1.6em;">
					<?php echo $fornecedor['nome']; ?>
				</span>
		    </div>

	</div>
	<!-- 	FIM - Caixa de pesquisa de clientes -->

	<div id="formsPagamento">
   		<?php	echo $this->Form->create ( null, [ 
			'url' => '/pagamentos/conclui',
			'id' => 'obsercacaoForm',
			'autocomplete'=>"off",
   			'type' => 'post',
		] );
		?>
			<div class='row' style="margin-top: 1.6em;">
				<div class='large-3 large-offset-3 columns'>Escolha a forma de pagamento</div>
				<div class='large-3 columns end'>
					<?php echo $this->Form->select('formaPagamento',
							[	'Dinheiro'=>'Dinheiro',
								'Depósito' => 'Depósito', 
								'Transferência' => 'Transferência',
								'Cheque' => 'Cheque',
							] ) ?>
				</div>
			</div> 
	
			<div class='row' style="margin-top: 1.6em;">
					<div class='large-7 large-offset-3 columns end'>
						Observações	<!-- Observações para este pagamento -->
					   	<?php
									echo $this->Form->textarea ( 'observacaoPagamento', [ 
											'rows' => 4,
											'id' => 'observacaoPagamento',] ); ?>
				    </div>
				
			</div>
		
			<div class='row' style="margin-top: 4em;">
				<div class='large-4 large-offset-1 end columns'>
					<ul class="pricing-table">
						<li class="title">Total a Pagar</li>
						<li class="price" id="valorTotal"><?php echo $this->Number->currency($total)?></li>
					</ul>
				</div>
				<div class='large-3 large-offset-2 columns'>
						<?php echo $this->Form->submit("Concluir Pagamento", ['class'=>'button medium round',
												'id' =>'concluiPagamento'] )?>
				</div>
			</div>

		<?php echo $this->Form->end();?>
 	</div> <!-- forms -->
 	
</div>



<?php echo $this->Html->script('jquery.redirect'); ?>