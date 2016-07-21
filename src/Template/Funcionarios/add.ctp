<nav class="large-2 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario)?>
    <fieldset>
		<legend><?= __('Add Funcionario') ?></legend>

		<fieldset>
			<legend>Informações Essenciais</legend>
			<div class="row">
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('nome_completo'); ?>
	        	</div>
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('nome_login', ['label' => 'Login']); ?>
	        	</div>
			</div>
			<div class="row">
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('senha'); ?>
	        	</div>
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('CPF'); ?>
	        	</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Permissões </legend>
			<div class="large-6 columns">
				<label> Opções: </label>
				<div class='row'>
					<div class='large-5 large-offset-1 columns'>
	        				<?php echo $this->Form->input('admin'); ?>
	        			</div>
					<div class='large-5 columns end'>
	        				<?php echo $this->Form->input('ativo', ['checked']); ?>
	        			</div>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Informações Complementares</legend>
			<div class="row">
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('telefone'); ?>
	        	</div>
			</div>
			<div class="row">
				<div class="large-10 columns">    
	        		<?php echo $this->Form->input('descricao', ['label'=>'Descrição', 'rows'=>'3']); ?>
	        	</div>
			</div>
		</fieldset>

	</fieldset>
    <?= $this->Form->button(__('Submit'))?>
    <?= $this->Form->end()?>
</div>

<?php echo $this->Html->script('validaCPF'); ?>