
<div class="produtos index large-9 medium-8 columns content">
    <h3>Relatório de Pagamentos Futuros</h3>
    <br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
				<th> Fornecedor </th>
				<th> Total </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagamentos as $pagamento): ?>
	            <tr>
					<td> <?= $pagamento->fornecedor_nome; ?> </td>
					<td> <?= $this->Number->currency($pagamento->totalPorFornecedor); ?> </td>
	            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
