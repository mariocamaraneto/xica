<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Pagamentos</h3>
		</div>	
</div>
<div class="pagamentos index large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('fornecedores_nome', ['label'=>'Fornecedor']) ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento', ['label'=>'Pagamento']) ?></th>
                <th><?= $this->Paginator->sort('funcionarios_nome_login', ['label'=>'Funcionário']) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagamentos as $pagamento): ?>
            <tr>
                <td><?= $this->Time->format($pagamento->data, "dd/MM/yyyy") ?></td>
                <td><?= $pagamento->has('fornecedor') ? $this->Html->link($pagamento->fornecedor->nome, ['controller' => 'Fornecedores', 'action' => 'view', $pagamento->fornecedor->id]) : '' ?></td>
                <td><?= $this->Number->currency($pagamento->valor) ?></td>
                <td><?= h($pagamento->forma_pagamento) ?></td>
                <td><?= $pagamento->has('funcionario') ? $this->Html->link($pagamento->funcionario->nome_login, ['controller' => 'Funcionarios', 'action' => 'view', $pagamento->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagamento->id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagamento->id]) ?>
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
    </div>
</div>
