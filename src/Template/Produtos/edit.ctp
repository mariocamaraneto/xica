<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtos form large-9 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend><?= __('Edit Produto') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('marca');
            echo $this->Form->input('material');
            echo $this->Form->input('cor');
            echo $this->Form->input('referencia');
            echo $this->Form->input('custo_bruto');
            echo $this->Form->input('preco');
            echo $this->Form->input('descricao');
            echo $this->Form->input('fornecedor_id', ['options' => $fornecedores]);
            echo $this->Form->input('quantidade');
            echo $this->Form->input('vendas._ids', ['options' => $vendas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
