<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Cadastro de Clientes</h3>
		</div>	
</div>

<div class="clientes form large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        
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
    	<legend class='groupbox'>Informações Complementares</legend>
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
        
    <?= $this->Form->button('Salvar', ['class'=>'button round ']) ?>
    <?= $this->Form->end() ?>
</div>
