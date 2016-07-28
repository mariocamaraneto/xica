<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Visualização de Venda</h3>
		</div>	
</div>

<div class="vendas view large-8 large-offset-2 medium-8 columns">
    <div class='row'>
    	<div class="large-2 large-offset-10 columns end">
    		 <?= $this->Html->link(__('Cancelar'), ['action' => 'cancela', $venda->id], 
    		 		['class'=>'button round small','confirm' => 'Deseja realmente cancelar esta venda?']) ?>
    	</div>
    </div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= $venda->data ?></td>
        </tr>        <tr>
            <th><?= __('Desconto') ?></th>
            <td><?= $this->Number->currency($venda->desconto) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma Pagamento') ?></th>
            <td><?= h($venda->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Cliente') ?></th>
            <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Funcionário') ?></th>
            <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->nome_completo, ['controller' => 'Funcionarios', 'action' => 'view', $venda->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->currency($venda->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= $venda->cancelada ? 'Cancelada' : 'Realizada' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($venda->produtos)): ?>
        <small>
        			<?= $venda->cancelada ? '*Todos os produtos já foram 
					colocados em estoque automáticamente' : '' ?>
		</small>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Nome') ?></th>
                <th><?= __('Marca') ?></th>
                <th><?= __('Preço') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venda->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->marca) ?></td>
                <td><?= $this->Number->currency($produtos->preco) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
