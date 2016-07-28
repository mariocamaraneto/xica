<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Parcelamentos</h3>
		</div>	
</div>

<div class="parcelas index large-8 large-offset-2 medium-11 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('num_parcela', ['label'=>'Parcela']) ?></th>
                <th><?= $this->Paginator->sort('valor_pago') ?></th>
                <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                <th><?= $this->Paginator->sort('Cliente') ?></th>
                <th><?= $this->Paginator->sort('valor_total') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parcelas as $parcela): ?>
            <tr>
                <td><?= $this->Number->format($parcela->num_parcela) ?></td>
                <td><?= $this->Number->currency($parcela->valor_pago) ?></td>
                <td><?= h($parcela->data_vencimento) ?></td>
                <td><?= h($parcela->venda->cliente->nome) ?></td>
                <td><?= $this->Number->currency($parcela->valor_total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parcela->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parcela->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parcela->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcela->id)]) ?>
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
