
    <h3>Recibo de Pagamento</h3>
    <br><br>
		<p style='font-size:1.5em; margin:0.1em;'><strong>Fornecedor:</strong> <?= h($pagamento->fornecedor->nome) ?></p>
		<p style='font-size:1.5em; margin:0.1em;'><strong>Data do Pagamento:</strong> <?= h($pagamento->data) ?></p>
		<p style='font-size:1.5em; margin:0.1em;'><strong>Valor Total:</strong> <?= $this->Number->currency($pagamento->valor) ?></p>
		<p style='font-size:1.5em; margin:0.1em;'><strong>Forma de Pagamento:</strong> <?= h($pagamento->forma_pagamento) ?></p>
		<p style='font-size:1.5em; margin:0.1em;'><strong>Observacões:</strong> <?= h($pagamento->observacoes) ?></p>
		<p style='font-size:1.5em; margin:0.1em;'><strong>Funcionário:</strong> <?= $pagamento->has('funcionario') ? $pagamento->funcionario->nome_login : '' ?></p>
	<div class="related">
		<h3>Produtos Pagos</h3>
        <?php if (!empty($pagamento->vendas_produtos)): ?>
        <table cellpadding="0" cellspacing="0">
			<tr>
				<th>Produtos</th>
				<th>Valor a ser pago </th>
			</tr>
            <?php foreach ($pagamento->vendas_produtos as $vendasProdutos): ?>
            <tr>
				<td><?= h($vendasProdutos->produto['nome']) ?></td>
				<td><?= $this->Number->currency($vendasProdutos->produto['custo_bruto']) ?></td>
			</tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    