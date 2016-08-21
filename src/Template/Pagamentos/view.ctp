<div class='row'>
	<div id='parallelogram'></div>
	<div id="trianguloTituloTela">
		<h3 id='tituloTela'>Visualização de Pagamento</h3>
	</div>
</div>

<div
	class="produtos view large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <div class='row'>
		<div class="large-7 columns">
			<h3><?= h($pagamento->fornecedor->nome) ?></h3>
    	</div>
    	<div class="large-3 large-offset-2 columns end">
    		 <?= $this->Html->link(__('Gerar PDF'), ['action' => 'pdfporid', $pagamento->id, '.pdf'], ['class'=>'button round small', 'target' => '_blank']) ?>
    	</div>
    </div>
	<table class="vertical-table">
		<tr>
			<th><?= __('Data') ?></th>
			<td><?= h($pagamento->data) ?></td>
		</tr>
		<tr>
			<th><?= __('Valor') ?></th>
			<td><?= $this->Number->currency($pagamento->valor) ?></td>
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
			<td><?= $pagamento->has('funcionario') ? $this->Html->link($pagamento->funcionario->nome_login, ['controller' => 'Funcionarios', 'action' => 'view', $pagamento->funcionario->id]) : '' ?></td>
		</tr>
	</table>
	<div class="related">
		<h4>Produtos Pagos</h4>
        <?php if (!empty($pagamento->vendas_produtos)): ?>
        <table cellpadding="0" cellspacing="0">
			<tr>
				<th>Produtos</th>
				<th>Valor a ser pago </th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
            <?php foreach ($pagamento->vendas_produtos as $vendasProdutos): ?>
            <tr>
				<td><?= h($vendasProdutos->produto['nome']) ?></td>
				<td><?= $this->Number->currency($vendasProdutos->produto['custo_bruto']) ?></td>
				<td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $vendasProdutos->produto_id])?>
                    /
                    <?= $this->Html->link(__('Edit'), ['controller' => '	Produtos', 'action' => 'edit', $vendasProdutos->produto_id])?>
                </td>
			</tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
