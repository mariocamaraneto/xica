
<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Relatórios de Vendas</h3>
		</div>	
</div>

<div class='large-6 large-offset-3 medium-8 columns'>
	
	<?php echo $this->Form->create(null, [
			'url' => ['action' => 'relatorios', '.pdf'],  
			'target' => '_blank']); 
	?>
	
	<fieldset>
		<fieldset>
			<legend>Parâmetros de Vendas</legend>
		
			<div class='row'>
				<div class='large-3 columns'>
					<?php echo $this->Form->input('intervaloDias', [
								'label'=>'Dias atrás', 
								'value'=>'0',
								'type'=>'number',
								'min'=>'0',
						]); ?>
				</div>
				<div class='large-1 columns'>
					<br>ou
				</div>
				<div class='large-2 columns'>
					<?php 	echo $this->Form->label('dia', 'Dia');
							echo $this->Form->day('dia'); ?>
				</div>
				<div class='large-3 columns'>
					<?php 	echo $this->Form->label('mes', 'Mês');
							echo $this->Form->month('mes'); ?>
				</div>
				<div class='large-3 columns end'>
					<?php 	echo $this->Form->label('ano', 'Ano');
							echo $this->Form->year('ano', ['minYear'=>'2016', 'maxYear'=>'2025']); ?>
				</div>
			</div>
			<div class='row'>
				<div class='large-3 columns'>
					<?php 	echo $this->Form->label('formaPagamento', 'Pagamento');
							echo $this->Form->select('formaPagamento', [
									'todas'=>'Todas', 
									'dinheiro'=>'Dinheiro',
									'prazo'=>'Prazo',
									'cartao'=>'Cartão',
									'cheque'=>'Cheque'],
									['default'=>'todas']); ?>
					
				</div>
				<div class='large-4 large-offset-1  end columns'>
					<?php 	echo $this->Form->label('estadoVenda', 'Estado da venda');
							echo $this->Form->select('estadoVenda', [
									'realizada'=>'Realizadas', 
									'cancelada'=>'Canceladas',
									'todas'=>'Todas'],
									['default'=>'realizada']); ?>
					
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Atributos de Vendas</legend>
			<div class='row'>
				<div class='large-10 columns'>
						<?php echo $this->Form->input('data', ['label'=>'Data da venda', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('cliente', ['label'=>'Cliente que efetuou venda', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('forma_pagamento', ['label'=>'Tipo de pagamento da venda', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('subtotal', ['label'=>'Subtotal da venda', 'type'=>'checkbox']);?>
						<?php echo $this->Form->input('desconto', ['label'=>'Desconto da venda', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('total', ['label'=>'Total da venda', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('produtos', ['label'=>'Produtos de cada venda', 'type'=>'checkbox']);?>
						<?php echo $this->Form->input('funcionario', ['label'=>'Funcionário que realizou a venda', 'type'=>'checkbox']);?>
						
				</div>
			</div>
		</fieldset>
	</fieldset>	
	
	<?php echo $this->Form->button('Gerar PDF', ['class'=>'button small round right']); ?>
	<?php echo $this->Form->button('Visualizar', ['class'=>'button small round right', 'formaction'=>'/vendas/relatorios']); ?>

	<?php echo $this->Form->end();?>
	
	
</div>