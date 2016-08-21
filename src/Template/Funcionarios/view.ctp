<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Visualização de Funcionário</h3>
		</div>	
</div>

<div class="funcionarios view large-8 large-offset-2 medium-10 medium-offset-1 columns">
	<div class='row'>
		<div class="large-7 columns">
    		<h3><?= $funcionario->nome_completo ?></h3>
    	</div>
    	<div class="large-3 columns">
    		<?= $this->Html->link('Ver Vendas', ['action' => 'vendasFuncionario', $funcionario->id], ['class'=>'button round small']) ?>
    	</div>
    	<div class="large-2 columns">
    		<?= $this->Html->link(__('Editar'), ['action' => 'edit', $funcionario->id], ['class'=>'button round small']) ?>
    	</div>
    </div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome Login') ?></th>
            <td><?= h($funcionario->nome_login) ?></td>
        </tr>
        <tr>
            <th><?= __('CPF') ?></th>
            <td><?= h($funcionario->CPF) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($funcionario->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($funcionario->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Admin') ?></th>
            <td><?= $funcionario->admin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $funcionario->ativo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
