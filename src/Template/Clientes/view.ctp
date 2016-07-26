<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Visualização de Clientes</h3>
		</div>	
</div>

<div class="clientes view large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <div class='row'>
		<div class="large-7 columns">
		    <h3><?= h($cliente->nome) ?></h3>
    	</div>
    	<div class="large-2 large-offset-3 columns end">
    		<?= $this->Html->link(__('Editar'), ['action' => 'edit', $cliente->id], ['class'=>'button round small']) ?>
    	</div>
    </div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($cliente->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Nascimento') ?></th>
            <td><?= h($cliente->data_nasc) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereço') ?></th>
            <td><?= h($cliente->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Número') ?></th>
            <td><?= h($cliente->numero) ?></td>
        </tr>
        <tr>
            <th><?= __('Bairro') ?></th>
            <td><?= h($cliente->bairro) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($cliente->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Complemento') ?></th>
            <td><?= h($cliente->complemento) ?></td>
        </tr>
        <tr>
            <th><?= __('Observações') ?></th>
            <td><?= h($cliente->observacoes) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Vendas Relacionadas') ?></h4>
        <?php if (!empty($cliente->vendas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Data') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Desconto') ?></th>
                <th><?= __('Pagamento') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->vendas as $vendas): ?>
            <tr>
                <td><?= $this->Time->format( $vendas->data, 'dd/MM/yyyy') ?></td>
                <td><?= $this->Number->currency($vendas->total) ?></td>
                <td><?= $this->Number->currency($vendas->desconto) ?></td>
                <td><?= $vendas->forma_pagamento ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $vendas->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
