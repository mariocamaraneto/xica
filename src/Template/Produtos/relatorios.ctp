
<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Relatórios de Produtos</h3>
		</div>	
</div>

<div class='large-4 large-offset-4 medium-8 columns'>
	
	<?php echo $this->Form->create(null, [
			'url' => ['action' => 'relatorios', '.pdf'],  
			'target' => '_blank']); 
	?>
	
	<fieldset>
		<fieldset>
			<legend>Parâmetros de Produtos</legend>
		
			<div class='row'>
				<div class='large-5 columns'>
					<?php echo $this->Form->select('tipo', [
							'todos'=>'Todos', 
							'emEstoque'=>'Em Estoque', 
							'foraEstoque'=>'Fora de Estoque'],
							['default'=>'todos']) ?>
				</div>
				<div class='large-7 columns'>
					<?php echo $this->Form->radio('ordenacao', [
							'referencia'=>'Ord. por Referência', 
							'alfebetica'=>'Ord. Alfabética'],
							['default'=>'referencia']) ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Parâmetros de Vendas</legend>
				<div class='row'>
					<div class='large-6 columns end'>
						<?php echo $this->Form->input('intervaloDiasVendidos', [
								'label'=>'Produtos vendidos nos últimos dias', 
								'value'=>'0',
								'type'=>'number',
								'min'=>'0',
						]); 
						?>
					</div>
				</div>
				<div class='row'>
					<p><small>Se dias atrás for igual a 0 (zero) esse parâmetro será ignorado</small></p>
				</div>
		</fieldset>
	</fieldset>	
	
	<?php echo $this->Form->button('Gerar PDF', ['class'=>'button small round right']); ?>
	<?php echo $this->Form->end();?>
	
	
</div>