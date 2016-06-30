<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produto->id],
                ['confirm' => __('Tem certeza que deseja deletar "{0}"?', $produto->nome)]
            )
        ?></li>
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
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
