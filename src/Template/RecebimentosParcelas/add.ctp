<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Recebimentos Parcelas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parcelas'), ['controller' => 'Parcelas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parcela'), ['controller' => 'Parcelas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recebimentosParcelas form large-9 medium-8 columns content">
    <?= $this->Form->create($recebimentosParcela) ?>
    <fieldset>
        <legend><?= __('Add Recebimentos Parcela') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
