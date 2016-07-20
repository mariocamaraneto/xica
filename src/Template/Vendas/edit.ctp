<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venda->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vendas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="vendas form large-9 medium-8 columns content">
    <?= $this->Form->create($venda) ?>
    <fieldset>
        <legend><?= __('Edit Venda') ?></legend>
        <?php
            echo $this->Form->input('data');
            echo $this->Form->input('total');
            echo $this->Form->input('desconto');
            echo $this->Form->input('forma_pagamento');
            echo $this->Form->input('cliente_id', ['options' => $clientes]);
            echo $this->Form->input('funcionarios_id', ['options' => $funcionarios]);
            echo $this->Form->input('produtos._ids', ['options' => $produtos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
