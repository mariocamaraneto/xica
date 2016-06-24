<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vendas Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagamentos'), ['controller' => 'Pagamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagamento'), ['controller' => 'Pagamentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vendasProdutos index large-9 medium-8 columns content">
    <h3><?= __('Vendas Produtos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('venda_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('pagamento_id') ?></th>
                <th><?= $this->Paginator->sort('quantidade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendasProdutos as $vendasProduto): ?>
            <tr>
                <td><?= $vendasProduto->has('venda') ? $this->Html->link($vendasProduto->venda->id, ['controller' => 'Vendas', 'action' => 'view', $vendasProduto->venda->id]) : '' ?></td>
                <td><?= $vendasProduto->has('produto') ? $this->Html->link($vendasProduto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $vendasProduto->produto->id]) : '' ?></td>
                <td><?= $vendasProduto->has('pagamento') ? $this->Html->link($vendasProduto->pagamento->id, ['controller' => 'Pagamentos', 'action' => 'view', $vendasProduto->pagamento->id]) : '' ?></td>
                <td><?= $this->Number->format($vendasProduto->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vendasProduto->venda_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendasProduto->venda_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendasProduto->venda_id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendasProduto->venda_id)]) ?>
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
