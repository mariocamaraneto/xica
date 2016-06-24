<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario) ?>
    <fieldset>
        <legend><?= __('Add Funcionario') ?></legend>
        <?php
            echo $this->Form->input('nome_completo');
            echo $this->Form->input('nome_login');
            echo $this->Form->input('senha');
            echo $this->Form->input('CPF');
            echo $this->Form->input('telefone');
            echo $this->Form->input('admin');
            echo $this->Form->input('ativo');
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
