<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios index large-9 medium-8 columns content">
    <h3><?= __('Funcionarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nome_completo') ?></th>
                <th><?= $this->Paginator->sort('nome_login') ?></th>
                <th><?= $this->Paginator->sort('telefone') ?></th>
                <th><?= $this->Paginator->sort('admin') ?></th>
                <th><?= $this->Paginator->sort('ativo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?= h($funcionario->nome_completo) ?></td>
                <td><?= h($funcionario->nome_login) ?></td>
                <td><?= h($funcionario->telefone) ?></td>
                <td><?= h( ($funcionario->admin) ? "Sim" : "Não") ?></td>
                <td><?= h( ($funcionario->ativo) ? "Sim" : "Não") ?></td>
                <td class="actions">
                    <?= $this->Html->link('Ver', ['action' => 'view', $funcionario->id]) ?>
                    /
                    <?= $this->Html->link('Editar', ['action' => 'edit', $funcionario->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
