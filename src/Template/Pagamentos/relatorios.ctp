
<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Relatórios de Pagamentos</h3>
		</div>	
</div>

<div class='large-6 large-offset-3 medium-8 columns'>
	
	<?php echo $this->Form->create(null, [
			'url' => ['action' => 'relatorios', '.pdf'],  
			'target' => '_blank']); 
	?>
	
	<fieldset>
		<fieldset>
			<legend>Parâmetros de Pagamentos</legend>
		
			<div class='row'>
				<div class='large-3 columns'>
					<?php 
						echo $this->Form->label('tipo', 'Tipo');
						echo $this->Form->radio('tipo', ['efetuados'=>'Efetuados', 'futuros'=>'Futuros'], ['default'=>'efetuados']);  
					?>
				</div>
				<div class='large-9 columns'>
					<div class='row'>
						<?php echo $this->Form->label('','Data Inicial');?>
							<div class='large-10 large-offset-1 columns'>
								<div class='large-3 columns'>
									<?php 	echo $this->Form->label('diaInicio', 'Dia');
											echo $this->Form->day('diaInicio'); ?>
								</div>
								<div class='large-5 columns'>
									<?php 	echo $this->Form->label('mesInicio', 'Mês');
											echo $this->Form->month('mesInicio'); ?>
								</div>
								<div class='large-4 columns end'>
									<?php 	echo $this->Form->label('anoInicio', 'Ano');
											echo $this->Form->year('anoInicio', ['minYear'=>'2016', 'maxYear'=>'2025']); ?>
								</div>
							</div>
					</div>
					<div class='row'> 
						<?php echo $this->Form->label('','Data Final');?>
							<div class='large-10 large-offset-1 columns'>
								<div class='large-3 columns'>
									<?php 	echo $this->Form->label('diaFinal', 'Dia');
											echo $this->Form->day('diaFinal'); ?>
								</div>
								<div class='large-5 columns'>
									<?php 	echo $this->Form->label('mesFinal', 'Mês');
											echo $this->Form->month('mesFinal'); ?>
								</div>
								<div class='large-4 columns end'>
									<?php 	echo $this->Form->label('anoFinal', 'Ano');
											echo $this->Form->year('anoFinal', ['minYear'=>'2016', 'maxYear'=>'2025']); ?>
								</div>
							</div>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Atributos de Pagamentos</legend>
			<div class='row'>
				<div class='large-10 columns'>
						<?php echo $this->Form->input('dataPagamento', ['label'=>'Data do pagamento', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('fornecedor', ['label'=>'Nome da fornecedora', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('total', ['label'=>'Total', 'type'=>'checkbox', 'checked']);?>
						<?php echo $this->Form->input('forma_pagamento', ['label'=>'Tipo de pagamento (dinheiro, cheque, ...)', 'type'=>'checkbox']);?>
						<?php echo $this->Form->input('produtos', ['label'=>'Produtos de cada pagamento', 'type'=>'checkbox']);?>
						<?php echo $this->Form->input('funcionario', ['label'=>'Funcionário que realizou o pagamento', 'type'=>'checkbox']);?>
						
				</div>
			</div>
		</fieldset>
	</fieldset>	
	
	<?php echo $this->Form->button('Gerar PDF', ['class'=>'button small round right']); ?>
	<?php echo $this->Form->button('Visualizar', ['class'=>'button small round right', 'formaction'=>'/pagamentos/relatorios']); ?>

	<?php echo $this->Form->end();?>
	
	
</div>