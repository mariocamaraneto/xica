<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($cliente->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Nasc') ?></th>
            <td><?= h($cliente->data_nasc) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($cliente->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($cliente->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero') ?></th>
            <td><?= h($cliente->numero) ?></td>
        </tr>
        <tr>
            <th><?= __('Bairro') ?></th>
            <td><?= h($cliente->bairro) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($cliente->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Complemento') ?></th>
            <td><?= h($cliente->complemento) ?></td>
        </tr>
        <tr>
            <th><?= __('Observacoes') ?></th>
            <td><?= h($cliente->observacoes) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vendas') ?></h4>
        <?php if (!empty($cliente->vendas)): ?>
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
            <?php foreach ($cliente->vendas as $vendas): ?>
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
