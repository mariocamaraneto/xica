<nav class="large-2 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?=$this->Form->postLink ( __ ( 'Delete' ), [ 'action' => 'delete',$funcionario->id ], [ 'confirm' => __ ( 'Are you sure you want to delete # {0}?', $funcionario->id ) ] )?></li>
		<li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario)?>
    <fieldset>
		<legend><?= __('Edit Funcionario') ?></legend>

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
	        		<?php echo $this->Form->input('CPF'); ?>
	        	</div>
				<div class="large-6 columns">    
	        		<?php echo $this->Form->input('senha', ['style'=>"display: none"]); ?>
	        		<a id='redefinir'>Clique Para Redefinir Senha</a>
					<script type="text/javascript">
	        			$('#redefinir').on('click', function (){
	        											$('#redefinir').hide();
	        											$('#senha').show();
	        											$('#senha').val('');
	        			});
	        		</script>
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
	        				<?php echo $this->Form->input('ativo'); ?>
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

