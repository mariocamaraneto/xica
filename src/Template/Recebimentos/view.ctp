<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Visualização de Recebimento</h3>
		</div>	
</div>

<div class="recebimentos view large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <table class="vertical-table">
        <tr>
            <th><?= __('Forma Pagamento') ?></th>
            <td><?= h($recebimento->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Funcionario') ?></th>
            <td><?= $recebimento->has('funcionario') ? $this->Html->link($recebimento->funcionario->nome_login, ['controller' => 'Funcionarios', 'action' => 'view', $recebimento->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->currency($recebimento->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($recebimento->data) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4>Parcelas Pagas</h4>
        <?php if (!empty($recebimento->parcelas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Num Parcela') ?></th>
                <th><?= __('Data Vencimento') ?></th>
                <th><?= __('Valor Total') ?></th>
                <th><?= __('Valor Pago') ?></th>
                <th>Vendas</th>
            </tr>
            <?php foreach ($recebimento->parcelas as $parcelas): ?>
            <tr>
                <td><?= h($parcelas->num_parcela) ?>/<?= $parcelas->venda->numero_parcelas ?></td>
                <td><?= h($parcelas->data_vencimento) ?></td>
                <td><?= $this->Number->currency($parcelas->valor_total) ?></td>
                <td><?= $this->Number->currency($parcelas->valor_pago) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $parcelas->vendas_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vendas', 'action' => 'edit', $parcelas->vendas_id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
