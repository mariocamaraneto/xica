<nav class="large-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Funcionario'), ['action' => 'edit', $funcionario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionario'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?> </li>
    </ul>
</nav>
<div class="funcionarios view large-9 medium-8 columns content">
    <h3><?= $funcionario->nome_completo ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome Login') ?></th>
            <td><?= h($funcionario->nome_login) ?></td>
        </tr>
        <tr>
            <th><?= __('CPF') ?></th>
            <td><?= h($funcionario->CPF) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($funcionario->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Descricao') ?></th>
            <td><?= h($funcionario->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Admin') ?></th>
            <td><?= $funcionario->admin ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $funcionario->ativo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
