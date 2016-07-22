<nav class="large-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cliente->id],
                ['confirm' => ('Deseja realmente deletar o cliente ' . $cliente->nome . "?")]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    
    <fieldset>
        <legend><?= __('Edit Cliente') ?></legend>

		<fieldset>
	        <legend>Informações Essenciais</legend>
	        <div class="row">
	        	<div class="large-6 columns">    
	        		<?php echo $this->Form->input('nome'); ?>
	        	</div>
	        	<div class="large-3 columns">    
	        		<?php echo $this->Form->input('data_nasc', ['label'=>'Data de Nascimento']); ?>
	        	</div>
	        	<div class='large-3 columns'>
	        		<?php echo $this->Form->input('cpf', ['label' => 'CPF']); ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="large-6 columns">    
	        		<?php echo $this->Form->input('telefone'); ?>
	        	</div>
	        	<div class="large-6 columns">    
	        		<?php echo $this->Form->input('email'); ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="large-3 columns">
	        		<?php echo $this->Form->input('num_roupa', ['label'=>'Número Roupa']); ?>    
	        	</div>
	        	<div class="large-3 columns end">
	        		<?php echo $this->Form->input('num_sapato', ['label'=>'Número Sapato']); ?>    
	        	</div>
	        </div>
    	</fieldset>
    	<fieldset>
    	<legend>Informações Complementares</legend>
			<div class="row">
	        	<div class="large-6 columns">    
	        		<?php echo $this->Form->input('endereco', ['label'=>'Endereço']); ?>
	        	</div>
	        	<div class="large-2 columns">    
	        		<?php echo $this->Form->input('numero', ['label'=>'Número']); ?>
	        	</div>
	        	<div class='large-4 columns'>
	        		<?php echo $this->Form->input('bairro'); ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="large-6 columns">    
	        		<?php echo $this->Form->input('cidade', ['value'=>'São José do Rio Preto']); ?>
	        	</div>
	        	<div class="large-6 columns">    
	        		<?php echo $this->Form->input('complemento'); ?>
	        	</div>
	        </div>
	        <div class='row'>
	        	<div class='large-8 columns'>
	        		<?php echo $this->Form->input('observacoes', ['label'=>'Observações', 'rows'=>'3']); ?>
	        	</div>
	        </div>
        </fieldset>
	</fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
