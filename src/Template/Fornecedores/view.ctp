<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Visualização de Fornecedores</h3>
		</div>	
</div>

<div class="fornecedores view large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <div class='row'>
		<div class="large-7 columns">
		    <h3><?= h($fornecedor->nome) ?></h3>
    	</div>
    	<div class="large-2 large-offset-3 columns end">
    		 <?= $this->Html->link(__('Editar'), ['action' => 'edit', $fornecedor->id], ['class'=>'button round small']) ?>
    	</div>
    </div>

    <table class="vertical-table">
        <tr>
            <th><?= __('CPF/CNPJ') ?></th>
            <td><?= h($fornecedor->CPF_CNPJ) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereço') ?></th>
            <td><?= h($fornecedor->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($fornecedor->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($fornecedor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Método de pagamento preferencial') ?></th>
            <td><?= h($fornecedor->metodo_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Conta bancária') ?></th>
            <td><?= h($fornecedor->conta_banco) ?></td>
        </tr>
        <tr>
            <th><?= __('Observações') ?></th>
            <td><?= h($fornecedor->observacoes) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Produtos relacionados') ?></h4>
        <?php if (!empty($fornecedor->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
            	<th><?= __('Referência') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Marca') ?></th>
                <th><?= __('Custo Bruto') ?></th>
                <th><?= __('Em estoque') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fornecedor->produtos as $produtos): ?>
            <tr>
            	<td><?= h($produtos->referencia) ?></td>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->marca) ?></td>
                <td><?= h($produtos->custo_bruto) ?></td>
                <td><?= ($produtos->em_estoque) ? 'Sim':'Não;'?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
