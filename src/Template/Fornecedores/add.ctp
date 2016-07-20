<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedores form large-9 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Add Fornecedor') ?></legend>
        
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
        		<?php echo $this->Form->input('endereco', ['label'=>'Endereço']); ?>
        	</div>
        	<div class='large-6 columns'>
        		<?php echo $this->Form->input('CPF_CNPJ', ['label'=>'CPF/CNPJ']); ?>
        	</div>
        </div>
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
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<?php echo $this->Html->script('validaCNPJ-CPF'); ?>