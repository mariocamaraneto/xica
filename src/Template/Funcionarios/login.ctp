<!-- INICIO - Painel suspenso que mostra os produtos resultados da pesquisa  -->
	<div id="myModal" class="modal">
	
		<!-- Modal content -->
		<div class="modal-content">
				
				<h3>Brechó da XICA</h3>
				
				<?= $this->Form->create() ?>
					<div class="row">
						<div class="large-10 large-offset-1 column">
							<?= $this->Form->input('nome_login', [
									'label'=>'Login', 
									'class' => 'campos-texto'
									
							]) ?>
						</div>
					</div>
					<div class="row">
						<div class="large-10 large-offset-1 column">
							<?= $this->Form->input('senha', [
										'type' => 'password',
										'label'=>'Senha', 
										'class' => 'campos-texto'
							]) ?>
						</div>
					</div>
						
					<div class="botao">
						<?= $this->Form->button('Login', ['class'=> 'button']) ?>
					</div>
				<?= $this->Form->end() ?>
				
	
	
		</div>
	</div>
<!-- FIM - Painel suspenso que mostra os produtos resultados da pesquisa  -->

<script type="text/javascript">
	$('#myModal').show();
</script>
</div>
