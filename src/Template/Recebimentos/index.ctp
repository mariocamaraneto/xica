<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Recebimentos</h3>
		</div>	
</div>

<div class="recebimentos index large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento') ?></th>
                <th><?= $this->Paginator->sort('funcionarios_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recebimentos as $recebimento): ?>
            <tr>
                <td><?= h($recebimento->data) ?></td>
                <td><?= $this->Number->currency($recebimento->valor) ?></td>
                <td><?= h($recebimento->forma_pagamento) ?></td>
                <td><?= $recebimento->has('funcionario') ? $this->Html->link($recebimento->funcionario->nome_login, ['controller' => 'Funcionarios', 'action' => 'view', $recebimento->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recebimento->id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recebimento->id]) ?>
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
