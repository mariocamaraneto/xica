<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($produto->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Marca') ?></th>
            <td><?= h($produto->marca) ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= h($produto->material) ?></td>
        </tr>
        <tr>
            <th><?= __('Cor') ?></th>
            <td><?= h($produto->cor) ?></td>
        </tr>
        <tr>
            <th><?= __('Referencia') ?></th>
            <td><?= h($produto->referencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($produto->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Fornecedor') ?></th>
            <td><?= $produto->has('fornecedor') ? $this->Html->link($produto->fornecedor->nome, ['controller' => 'Fornecedores', 'action' => 'view', $produto->fornecedor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Custo Bruto') ?></th>
            <td><?= $this->Number->format($produto->custo_bruto) ?></td>
        </tr>
        <tr>
            <th><?= __('Preco') ?></th>
            <td><?= $this->Number->format($produto->preco) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($produto->quantidade) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vendas') ?></h4>
        <?php if (!empty($produto->vendas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Desconto') ?></th>
                <th><?= __('Forma Pagamento') ?></th>
                <th><?= __('Cliente Id') ?></th>
                <th><?= __('Funcionarios Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->vendas as $vendas): ?>
            <tr>
                <td><?= h($vendas->id) ?></td>
                <td><?= h($vendas->data) ?></td>
                <td><?= h($vendas->total) ?></td>
                <td><?= h($vendas->desconto) ?></td>
                <td><?= h($vendas->forma_pagamento) ?></td>
                <td><?= h($vendas->cliente_id) ?></td>
                <td><?= h($vendas->funcionarios_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $vendas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vendas', 'action' => 'edit', $vendas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendas', 'action' => 'delete', $vendas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
