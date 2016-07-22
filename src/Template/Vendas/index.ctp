<nav class="large-2 columns" id="actions-sidebar">
   	<ul class="side-nav">
        <li class="heading">Ações</li>
        <li><?= $this->Html->link(__('New Venda'), ['action' => 'realiza']) ?></li>
    </ul>
    <ul class="side-nav">
        <li class="heading">Listagens</li>
        <li><?= $this->Html->link(__('Mostrar Vendas Canceladas'), ['action' => 'listcanceladas']) ?></li>
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
                <th><?= $this->Paginator->sort('forma_pagamento','Pagamento') ?></th>
                <th><?= $this->Paginator->sort('funcionarios_id', 'Funcionário') ?></th>
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
