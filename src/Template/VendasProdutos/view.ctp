<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vendas Produto'), ['action' => 'edit', $vendasProduto->venda_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vendas Produto'), ['action' => 'delete', $vendasProduto->venda_id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendasProduto->venda_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendas Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendas Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagamentos'), ['controller' => 'Pagamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagamento'), ['controller' => 'Pagamentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendasProdutos view large-9 medium-8 columns content">
    <h3><?= h($vendasProduto->venda_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Venda') ?></th>
            <td><?= $vendasProduto->has('venda') ? $this->Html->link($vendasProduto->venda->id, ['controller' => 'Vendas', 'action' => 'view', $vendasProduto->venda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $vendasProduto->has('produto') ? $this->Html->link($vendasProduto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $vendasProduto->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pagamento') ?></th>
            <td><?= $vendasProduto->has('pagamento') ? $this->Html->link($vendasProduto->pagamento->id, ['controller' => 'Pagamentos', 'action' => 'view', $vendasProduto->pagamento->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($vendasProduto->quantidade) ?></td>
        </tr>
    </table>
</div>
