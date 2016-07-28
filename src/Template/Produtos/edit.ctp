<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Edição de Produto</h3>
		</div>	
</div>

<div class="produtos form large-8 large-offset-2 medium-10 medium-offset-1 columns">
    
    <?= $this->Form->create($produto)?>
    <fieldset>
		<fieldset>
			<legend>Informações Básicas</legend>
			<div class="row">
				<div class="large-6 columns">    
        			<?php echo $this->Form->input('nome'); ?>
        		</div>
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('referencia', ['label'=>'Referência']); ?>
        		</div>
			</div>
			<div class="row">
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('custo_bruto', ['label'=>'Preço de Custo', 'type'=>'text']); ?>
	        	</div>
				<div class="large-6 columns">    
        	    	<?php echo $this->Form->input('preco', ['label'=>'Preço de Venda', 'type'=>'text']); ?>
	        	</div>
	        	<?php echo $this->Html->script('jquery.maskMoney.min');?>
   				<?= $this->fetch('script')?>
	        	<script type="text/javascript">
					$('#custo-bruto').maskMoney();
					$('#preco').maskMoney();
	        	</script>
			</div>
			<div class='row'>
				<div class="large-6 columns">
					<label>Fornecedor</label>
	        	<?php
										$optFornecedores = [ ];
										foreach ( $fornecedores as $fornecedor ) {
											$optFornecedores [$fornecedor->id] = $fornecedor->nome;
										}
										echo $this->Form->select ( 'fornecedor_id', $optFornecedores );
										?> 
	        		<!--<?php echo $this->Form->input('fornecedor_id', ['options' => $fornecedores]); ?> -->
				</div>
				<div class="large-6 columns">
					<label style='margin-right: 10px; margin-bottom: 8px;'>
						Em estoque:
					</label> 
					<label for="em-estoque-1" style='display: inline; margin-right: 7px;'> 
						<input name="em_estoque" value="1" id="em-estoque-1" type="radio" 
								<?php echo ($produto->em_estoque) ? "checked":''; ?>>
							Sim
					</label> 
					<label for="em-estoque-0" style='display: inline'>
						<input name="em_estoque" value="0" id="em-estoque-0" type="radio"
							<?php echo ($produto->em_estoque) ? "":'checked'; ?>>
							Não
					</label>
				</div>
			</div>
			<div class="row">
				<div class="large-6 columns">    
        			<?php echo $this->Form->input('tamanho'); ?>
        		</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Informações Complementares</legend>
			<div class="row">
				<div class="large-6 columns">    
        			<?php echo $this->Form->input('material'); ?>
        	</div>
				<div class="large-6 columns">    
        			<?php echo $this->Form->input('cor'); ?>
        		</div>
			</div>
			<div class="row">
				<div class="large-6 columns">
        	   		<?php echo $this->Form->input('marca'); ?>
        		</div>
				<div class="large-6 columns">    
        			<?php echo $this->Form->input('descricao', ['label'=>'Descrição']); ?>
        		</div>
			</div>
		</fieldset>
		
	</fieldset>
    <?= $this->Form->button('Salvar', ['class'=>'button round'])?>
    <?= $this->Form->end()?>
</div>
