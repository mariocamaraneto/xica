
<div class='painel-central'>
	<div class="row">	
			<h3>Painel de acesso ao sistema</h3>
	</div>

	<?= $this->Form->create() ?>
		<div class="row">
			<div class="large-12 column">
				<?= $this->Form->input('nome_login', [
						'label'=>'Nome de acesso do funcionário', 
						'class' => 'campos-texto'
						
				]) ?>
			</div>
		</div>
		<div class="row">
			<div class="large-12 column">
				<?= $this->Form->input('senha', [
							'type' => 'password',
							'label'=>'Senha', 
							'class' => 'campos-texto'
				]) ?>
			</div>
		</div>
			
		<div class="botao">
			<?= $this->Form->button('Login') ?>
		</div>
	<?= $this->Form->end() ?>
</div>
