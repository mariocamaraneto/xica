<nav class="large-2 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?></li>
		<li><?=$this->Form->postLink ( __ ( 'Delete' ), [ 'action' => 'delete',$fornecedor->id ], [ 'confirm' => __ ( 'Tem certeza que deseja deletar "{0}"?', $fornecedor->nome ) ] )?></li>
	</ul>
</nav>
<div class="fornecedores form large-9 large-offset-1 medium-8 columns content">
    <?= $this->Form->create($fornecedor)?>
    <fieldset>
		<legend><?= __('Add Fornecedor') ?></legend>

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