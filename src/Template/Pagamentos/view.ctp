<div class='row'>
	<div id='parallelogram'></div>
	<div id="trianguloTituloTela">
		<h3 id='tituloTela'>Visualização de Pagamento</h3>
	</div>
</div>

<div
	class="produtos view large-8 large-offset-2 medium-10 medium-offset-1 columns">
	<h3><?= h($pagamento->fornecedor->nome) ?></h3>
	<table class="vertical-table">
		<tr>
			<th><?= __('Data') ?></th>
			<td><?= h($pagamento->data) ?></td>
		</tr>
		<tr>
			<th><?= __('Valor') ?></th>
			<td><?= h($pagamento->valor) ?></td>
		</tr>
		<tr>
			<th><?= __('Forma de Pagamento') ?></th>
			<td><?= h($pagamento->forma_pagamento) ?></td>
		</tr>
		<tr>
			<th><?= __('Observacões') ?></th>
			<td><?= h($pagamento->observacoes) ?></td>
		</tr>
		<tr>
			<th><?= __('Funcionário') ?></th>
			<td><?= $pagamento->has('funcionario') ? $this->Html->link($pagamento->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $pagamento->funcionario->id]) : '' ?></td>
		</tr>
	</table>
	<div class="related">
		<h4><?= __('Related Vendas Produtos') ?></h4>
        <?php if (!empty($pagamento->vendas_produtos)): ?>
        <table cellpadding="0" cellspacing="0">
			<tr>
				<th><?= __('Produto Id') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
            <?php foreach ($pagamento->vendas_produtos as $vendasProdutos): ?>
            <tr>
				<td><?= h($vendasProdutos->produto_id) ?></td>
				<td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VendasProdutos', 'action' => 'view', $vendasProdutos->venda_id])?>
                    /
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VendasProdutos', 'action' => 'edit', $vendasProdutos->venda_id])?>
                </td>
			</tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
