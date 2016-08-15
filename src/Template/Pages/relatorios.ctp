<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Relatórios</h3>
		</div>	
</div>

<br><br><br>

<div class="large-6 large-offset-3 medium-6 columns">
	<fieldset>
		<legend>Tipos de relatórios</legend>
		<div class='row'>
			<div class='large-6 columns'>
				<?php echo $this->Html->link('Produtos', 
						['controller'=>'produtos', 'action' => 'relatorios'],
						['class'=>'button small round']);
				?>
			</div>
			<div class='large-6 columns'>
				<?php echo $this->Html->link('Vendas', 
						['controller'=>'vendas', 'action' => 'relatorios'],
						['class'=>'button small round']);
				?>
			</div>
		</div>
		<div class='row'>
			<div class='large-6 columns'>
				<?php echo $this->Html->link('Pagamentos', 
						['controller'=>'pagamentos', 'action' => 'relatorios'],
						['class'=>'button small round']);
				?>
			</div>
			<div class='large-6 columns'>
			</div>
		</div>		
	</fieldset>
</div>