<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Funcionários</h3>
		</div>	
</div>

<div class="funcionarios index large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nome_completo', ['label'=>'Nome']) ?></th>
                <th><?= $this->Paginator->sort('nome_login', 'Login')?></th>
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
    </div>
</div>
