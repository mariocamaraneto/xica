<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recebimento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recebimento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parcela'), ['controller' => 'Parcelas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recebimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($recebimento) ?>
    <fieldset>
        <legend><?= __('Edit Recebimento') ?></legend>
        <?php
            echo $this->Form->input('data', ['empty' => true]);
            echo $this->Form->input('forma_pagamento');
            echo $this->Form->input('valor');
            echo $this->Form->input('funcionarios_id', ['options' => $funcionarios]);
            echo $this->Form->input('parcelas._ids', ['options' => $parcelas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
