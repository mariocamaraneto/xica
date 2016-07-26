<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recebimento'), ['action' => 'edit', $recebimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recebimento'), ['action' => 'delete', $recebimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recebimento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parcela'), ['controller' => 'Parcelas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recebimentos view large-9 medium-8 columns content">
    <h3><?= h($recebimento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Forma Pagamento') ?></th>
            <td><?= h($recebimento->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Funcionario') ?></th>
            <td><?= $recebimento->has('funcionario') ? $this->Html->link($recebimento->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $recebimento->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recebimento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($recebimento->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($recebimento->data) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Parcelas') ?></h4>
        <?php if (!empty($recebimento->parcelas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Num Parcela') ?></th>
                <th><?= __('Valor Pago') ?></th>
                <th><?= __('Data Vencimento') ?></th>
                <th><?= __('Valor Total') ?></th>
                <th><?= __('Vendas Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recebimento->parcelas as $parcelas): ?>
            <tr>
                <td><?= h($parcelas->id) ?></td>
                <td><?= h($parcelas->num_parcela) ?></td>
                <td><?= h($parcelas->valor_pago) ?></td>
                <td><?= h($parcelas->data_vencimento) ?></td>
                <td><?= h($parcelas->valor_total) ?></td>
                <td><?= h($parcelas->vendas_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parcelas', 'action' => 'view', $parcelas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parcelas', 'action' => 'edit', $parcelas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parcelas', 'action' => 'delete', $parcelas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcelas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
