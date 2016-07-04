<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venda'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vendas index large-9 medium-8 columns content">
    <h3><?= __('Vendas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('cliente_id') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('desconto') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento') ?></th>
                <th><?= $this->Paginator->sort('funcionarios_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
            <tr>
                <td><?= h($venda->data) ?></td>
                <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
                <td><?= $this->Number->currency($venda->total) ?></td>
                <td><?= $this->Number->currency($venda->desconto) ?></td>
                <td><?= h($venda->forma_pagamento) ?></td>
                <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->nome_login, ['controller' => 'Funcionarios', 'action' => 'view', $venda->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venda->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venda->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
