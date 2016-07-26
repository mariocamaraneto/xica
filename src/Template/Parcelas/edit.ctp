<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parcela->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parcela->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parcelas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parcelas form large-9 medium-8 columns content">
    <?= $this->Form->create($parcela) ?>
    <fieldset>
        <legend><?= __('Edit Parcela') ?></legend>
        <?php
            echo $this->Form->input('num_parcela');
            echo $this->Form->input('valor_pago');
            echo $this->Form->input('data_vencimento', ['empty' => true]);
            echo $this->Form->input('valor_total');
            echo $this->Form->input('vendas_id', ['options' => $vendas]);
            echo $this->Form->input('recebimentos._ids', ['options' => $recebimentos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
