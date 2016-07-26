<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recebimentos Parcela'), ['action' => 'edit', $recebimentosParcela->parcelas_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recebimentos Parcela'), ['action' => 'delete', $recebimentosParcela->parcelas_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimentosParcela->parcelas_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recebimentos Parcelas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recebimentos Parcela'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parcela'), ['controller' => 'Parcelas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recebimentosParcelas view large-9 medium-8 columns content">
    <h3><?= h($recebimentosParcela->parcelas_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parcela') ?></th>
            <td><?= $recebimentosParcela->has('parcela') ? $this->Html->link($recebimentosParcela->parcela->id, ['controller' => 'Parcelas', 'action' => 'view', $recebimentosParcela->parcela->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Recebimento') ?></th>
            <td><?= $recebimentosParcela->has('recebimento') ? $this->Html->link($recebimentosParcela->recebimento->id, ['controller' => 'Recebimentos', 'action' => 'view', $recebimentosParcela->recebimento->id]) : '' ?></td>
        </tr>
    </table>
</div>
