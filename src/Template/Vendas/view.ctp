<nav class="large-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $venda->cancelada ? '' : $this->Form->postLink(__('Cancelar Venda'), ['action' => 'cancela', $venda->id], ['confirm' => __('Deseja cancelar esta vendas?')]) ?> </li>
        <li><?= $this->Html->link(__('List Vendas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Mostrar Vendas Canceladas'), ['action' => 'listcanceladas']) ?></li>
    </ul>
</nav>
<div class="vendas view large-9 medium-8 columns content">
    <h3>Visualização de Venda</h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= $venda->data ?></td>
        </tr>        <tr>
            <th><?= __('Desconto') ?></th>
            <td><?= $this->Number->currency($venda->desconto) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma Pagamento') ?></th>
            <td><?= h($venda->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Cliente') ?></th>
            <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Funcionário') ?></th>
            <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $venda->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->currency($venda->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $venda->cancelada ? 'Cancelada' : 'Realizada' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($venda->produtos)): ?>
        <small>
        			<?= $venda->cancelada ? '*Todos os produtos já foram 
					colocados em estoque automáticamente' : '' ?>
		</small>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Nome') ?></th>
                <th><?= __('Marca') ?></th>
                <th><?= __('Preço') ?></th>
                <th><?= __('Fornecedor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venda->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->marca) ?></td>
                <td><?= $this->Number->currency($produtos->preco) ?></td>
                <td><?= h($produtos->fornecedor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
