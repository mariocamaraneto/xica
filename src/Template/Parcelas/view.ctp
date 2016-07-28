<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parcela'), ['action' => 'edit', $parcela->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parcela'), ['action' => 'delete', $parcela->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcela->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parcelas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parcela'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parcelas view large-9 medium-8 columns content">
    <h3><?= h($parcela->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Venda') ?></th>
            <td><?= $parcela->has('venda') ? $this->Html->link($parcela->venda->id, ['controller' => 'Vendas', 'action' => 'view', $parcela->venda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parcela->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Num Parcela') ?></th>
            <td><?= $this->Number->format($parcela->num_parcela) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Pago') ?></th>
            <td><?= $this->Number->format($parcela->valor_pago) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Total') ?></th>
            <td><?= $this->Number->format($parcela->valor_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Vencimento') ?></th>
            <td><?= h($parcela->data_vencimento) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Recebimentos') ?></h4>
        <?php if (!empty($parcela->recebimentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Forma Pagamento') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Funcionarios Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($parcela->recebimentos as $recebimentos): ?>
            <tr>
                <td><?= h($recebimentos->id) ?></td>
                <td><?= h($recebimentos->data) ?></td>
                <td><?= h($recebimentos->forma_pagamento) ?></td>
                <td><?= h($recebimentos->valor) ?></td>
                <td><?= h($recebimentos->funcionarios_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recebimentos', 'action' => 'view', $recebimentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recebimentos', 'action' => 'edit', $recebimentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recebimentos', 'action' => 'delete', $recebimentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
