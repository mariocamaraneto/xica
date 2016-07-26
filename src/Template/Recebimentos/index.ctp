<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parcela'), ['controller' => 'Parcelas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recebimentos index large-9 medium-8 columns content">
    <h3><?= __('Recebimentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('funcionarios_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recebimentos as $recebimento): ?>
            <tr>
                <td><?= $this->Number->format($recebimento->id) ?></td>
                <td><?= h($recebimento->data) ?></td>
                <td><?= h($recebimento->forma_pagamento) ?></td>
                <td><?= $this->Number->format($recebimento->valor) ?></td>
                <td><?= $recebimento->has('funcionario') ? $this->Html->link($recebimento->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $recebimento->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recebimento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recebimento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recebimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimento->id)]) ?>
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
