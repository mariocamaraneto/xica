<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Recebimentos Parcela'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parcela'), ['controller' => 'Parcelas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recebimentosParcelas index large-9 medium-8 columns content">
    <h3><?= __('Recebimentos Parcelas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('parcelas_id') ?></th>
                <th><?= $this->Paginator->sort('recebimentos_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recebimentosParcelas as $recebimentosParcela): ?>
            <tr>
                <td><?= $recebimentosParcela->has('parcela') ? $this->Html->link($recebimentosParcela->parcela->id, ['controller' => 'Parcelas', 'action' => 'view', $recebimentosParcela->parcela->id]) : '' ?></td>
                <td><?= $recebimentosParcela->has('recebimento') ? $this->Html->link($recebimentosParcela->recebimento->id, ['controller' => 'Recebimentos', 'action' => 'view', $recebimentosParcela->recebimento->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recebimentosParcela->parcelas_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recebimentosParcela->parcelas_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recebimentosParcela->parcelas_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimentosParcela->parcelas_id)]) ?>
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
