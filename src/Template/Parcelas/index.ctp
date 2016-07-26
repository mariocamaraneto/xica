<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parcela'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parcelas index large-9 medium-8 columns content">
    <h3><?= __('Parcelas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('num_parcela') ?></th>
                <th><?= $this->Paginator->sort('valor_pago') ?></th>
                <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                <th><?= $this->Paginator->sort('valor_total') ?></th>
                <th><?= $this->Paginator->sort('vendas_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parcelas as $parcela): ?>
            <tr>
                <td><?= $this->Number->format($parcela->id) ?></td>
                <td><?= $this->Number->format($parcela->num_parcela) ?></td>
                <td><?= $this->Number->format($parcela->valor_pago) ?></td>
                <td><?= h($parcela->data_vencimento) ?></td>
                <td><?= $this->Number->format($parcela->valor_total) ?></td>
                <td><?= $parcela->has('venda') ? $this->Html->link($parcela->venda->id, ['controller' => 'Vendas', 'action' => 'view', $parcela->venda->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parcela->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parcela->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parcela->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcela->id)]) ?>
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
