<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Relatórios</h3>
		</div>	
</div>

<div class="large-10 large-offset-1 medium-12 columns">
	<div class='row'>
		<div class='large-6 columns'>
			<fieldset>
				<fieldset>
					<legend>Produtos</legend>
						<?php echo $this->Html->link('Em estoque', 
								['controller'=>'produtos', 'action' => 'index','.pdf'],
								['class'=>'button small round', 'target' => '_blank']);
						?>
						<button class='button small round'>Fora de Estoque</button>
						<button class='button small round'>Vendidos este mês</button>
						<button class='button small round'>Entraram este mês</button>
				</fieldset>
			</fieldset>
			<fieldset>
				<fieldset>
					<legend>Fornecedoras</legend>
						<button class='button small round'>Todas</button>
				</fieldset>
			</fieldset>
		</div>
		<div class='large-6 columns'>
			<fieldset>
				<fieldset>
					<legend>Clientes</legend>
						<button class='button small round'>Aniversariantes</button>
						<button class='button small round'>Devedores</button>
						<button class='button small round'>Compraram nesse mês</button>
				</fieldset>
			</fieldset>
			<fieldset>
				<fieldset>
					<legend>Vendas</legend>
						<button class='button small round'>Realizadas este mês</button>
						<button class='button small round'>Canceladas este mês</button>
						<button class='button small round'>Compraram nesse mês</button>
				</fieldset>
			</fieldset>
		</div>
	</div>
</div>