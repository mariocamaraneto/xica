
<div class="produtos index large-9 medium-8 columns content">
    <h3>Relatório de Todos os Produtos</h3>
    <br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= 'Referência' ?></th>
                <th><?= 'Nome' ?></th>
                <th><?= 'Preço' ?></th>
                <th><?= 'Em Estoque' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
            	<td><?= h($produto->referencia) ?></td>
                <td><?= h($produto->nome) ?></td>
                <td><?= $this->Number->currency($produto->preco) ?></td>
                <td><?= $produto->em_estoque ? "Sim" : "Não" ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
