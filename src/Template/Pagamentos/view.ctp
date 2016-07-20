<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagamento'), ['action' => 'edit', $pagamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagamento'), ['action' => 'delete', $pagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagamentos'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="pagamentos view large-9 medium-8 columns content">
    <h3><?= h($pagamento->fornecedor->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($pagamento->data) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= h($pagamento->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma de Pagamento') ?></th>
            <td><?= h($pagamento->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Observacões') ?></th>
            <td><?= h($pagamento->observacoes) ?></td>
        </tr>
        <tr>
            <th><?= __('Funcionário') ?></th>
            <td><?= $pagamento->has('funcionario') ? $this->Html->link($pagamento->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $pagamento->funcionario->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vendas Produtos') ?></h4>
        <?php if (!empty($pagamento->vendas_produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Produto Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pagamento->vendas_produtos as $vendasProdutos): ?>
            <tr>
                <td><?= h($vendasProdutos->produto_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VendasProdutos', 'action' => 'view', $vendasProdutos->venda_id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VendasProdutos', 'action' => 'edit', $vendasProdutos->venda_id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
