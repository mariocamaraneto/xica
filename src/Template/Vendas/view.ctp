<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Venda'), ['action' => 'edit', $venda->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venda'), ['action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venda'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendas view large-9 medium-8 columns content">
    <h3><?= h($venda->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($venda->data) ?></td>
        </tr>
        <tr>
            <th><?= __('Desconto') ?></th>
            <td><?= h($venda->desconto) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma Pagamento') ?></th>
            <td><?= h($venda->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Cliente') ?></th>
            <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Funcionario') ?></th>
            <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $venda->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($venda->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($venda->total) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($venda->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Marca') ?></th>
                <th><?= __('Material') ?></th>
                <th><?= __('Cor') ?></th>
                <th><?= __('Referencia') ?></th>
                <th><?= __('Custo Bruto') ?></th>
                <th><?= __('Preco') ?></th>
                <th><?= __('Descricao') ?></th>
                <th><?= __('Fornecedor Id') ?></th>
                <th><?= __('Quantidade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venda->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->id) ?></td>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->marca) ?></td>
                <td><?= h($produtos->material) ?></td>
                <td><?= h($produtos->cor) ?></td>
                <td><?= h($produtos->referencia) ?></td>
                <td><?= h($produtos->custo_bruto) ?></td>
                <td><?= h($produtos->preco) ?></td>
                <td><?= h($produtos->descricao) ?></td>
                <td><?= h($produtos->fornecedor_id) ?></td>
                <td><?= h($produtos->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produtos', 'action' => 'delete', $produtos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
