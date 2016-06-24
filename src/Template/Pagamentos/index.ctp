<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pagamento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendas Produtos'), ['controller' => 'VendasProdutos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendas Produto'), ['controller' => 'VendasProdutos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagamentos index large-9 medium-8 columns content">
    <h3><?= __('Pagamentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento') ?></th>
                <th><?= $this->Paginator->sort('observacoes') ?></th>
                <th><?= $this->Paginator->sort('fornecedores_id') ?></th>
                <th><?= $this->Paginator->sort('funcionarios_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagamentos as $pagamento): ?>
            <tr>
                <td><?= $this->Number->format($pagamento->id) ?></td>
                <td><?= h($pagamento->data) ?></td>
                <td><?= h($pagamento->valor) ?></td>
                <td><?= h($pagamento->forma_pagamento) ?></td>
                <td><?= h($pagamento->observacoes) ?></td>
                <td><?= $pagamento->has('fornecedor') ? $this->Html->link($pagamento->fornecedor->id, ['controller' => 'Fornecedores', 'action' => 'view', $pagamento->fornecedor->id]) : '' ?></td>
                <td><?= $pagamento->has('funcionario') ? $this->Html->link($pagamento->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $pagamento->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]) ?>
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
