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


<div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('nome'); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('data_nasc', ['label'=>'Data de Nascimento']); ?>
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
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('endereco', ['label'=>'Endereço']); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('numero', ['label'=>'Número']); ?>
        	</div>
        </div>
        <div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('bairro'); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('cidade'); ?>
        	</div>
        </div>
        <div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('complemento'); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('observacoes', ['label'=>'Observações']); ?>
        	</div>
        </div>


    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
