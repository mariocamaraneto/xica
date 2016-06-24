<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fornecedor'), ['action' => 'edit', $fornecedor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fornecedor'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fornecedores view large-9 medium-8 columns content">
    <h3><?= h($fornecedor->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('CPF CNPJ') ?></th>
            <td><?= h($fornecedor->CPF_CNPJ) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($fornecedor->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($fornecedor->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($fornecedor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Metodo de pagamento preferencial') ?></th>
            <td><?= h($fornecedor->metodo_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Conta bancária') ?></th>
            <td><?= h($fornecedor->conta_banco) ?></td>
        </tr>
        <tr>
            <th><?= __('Observações') ?></th>
            <td><?= h($fornecedor->observacoes) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Produtos relacionados') ?></h4>
        <?php if (!empty($fornecedor->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
            	<th><?= __('Referencia') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Marca') ?></th>
                <th><?= __('Custo Bruto') ?></th>
                <th><?= __('Quantidade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fornecedor->produtos as $produtos): ?>
            <tr>
            	<td><?= h($produtos->referencia) ?></td>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->marca) ?></td>
                <td><?= h($produtos->custo_bruto) ?></td>
                <td><?= h($produtos->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
