<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pagamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pagamentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendas Produtos'), ['controller' => 'VendasProdutos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendas Produto'), ['controller' => 'VendasProdutos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($pagamento) ?>
    <fieldset>
        <legend><?= __('Edit Pagamento') ?></legend>
        <?php
            echo $this->Form->input('data');
            echo $this->Form->input('valor');
            echo $this->Form->input('forma_pagamento');
            echo $this->Form->input('observacoes');
            echo $this->Form->input('fornecedores_id', ['options' => $fornecedores]);
            echo $this->Form->input('funcionarios_id', ['options' => $funcionarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
