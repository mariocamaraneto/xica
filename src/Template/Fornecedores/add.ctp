<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Cadastro de Fornecedoras</h3>
		</div>	
</div>

<div class="fornecedores form large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <?= $this->Form->create($fornecedor)?>
    <fieldset>
		<fieldset>
			<legend>Informações Básicas</legend>
			<div class='row'>
				<div class='large-6 columns'>
        		<?php echo $this->Form->input('nome'); ?>
        	</div>
				<div class='large-6 columns'>
        		<?php echo $this->Form->input('telefone'); ?>
        	</div>
			</div>
			<div class='row'>
				<div class='large-6 columns'>
        		<?php echo $this->Form->input('endereco', ['label'=>'Endereço Completo']); ?>
        	</div>
				<div class='large-6 columns'>
        		<?php echo $this->Form->input('CPF_CNPJ', ['label'=>'CPF/CNPJ']); ?>
        	</div>
			</div>
		</fieldset>
		<fieldset>
		<legend>Informações Complementares</legend>
		<div class='row'>
			<div class='large-6 columns'>
        		<?php echo $this->Form->input('email'); ?>
        	</div>
			<div class='large-6 columns'>
        		<?php echo $this->Form->input('metodo_pagamento', ['label'=>'Método de Pagamento Preferencial']); ?>
        	</div>
		</div>
		<div class='row'>
			<div class='large-6 columns'>
        		<?php echo $this->Form->input('conta_banco'); ?>
        	</div>
		</div>
		<div class='row'>
			<div class='large-8 columns'>
        		<?php echo $this->Form->input('observacoes',['label'=>'Observações', 'rows'=>'4']); ?>
        	</div>
		</div>
		</fieldset>

	</fieldset>
    <?= $this->Form->button(__('Submit'))?>
    <?= $this->Form->end()?>
</div>


<?php echo $this->Html->script('validaCNPJ-CPF'); ?>