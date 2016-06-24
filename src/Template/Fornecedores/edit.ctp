<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fornecedor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedores form large-9 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Edit Fornecedor') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('CPF_CNPJ');
            echo $this->Form->input('endereco');
            echo $this->Form->input('telefone');
            echo $this->Form->input('email');
            echo $this->Form->input('metodo_pagamento');
            echo $this->Form->input('conta_banco');
            echo $this->Form->input('observacoes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
