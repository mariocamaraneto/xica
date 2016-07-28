<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Visualização de Produtos</h3>
		</div>	
</div>

<div class="produtos view large-8 large-offset-2 medium-10 medium-offset-1 columns">
    <div class='row'>
		<div class="large-7 columns">
		    <h3><?= h($produto->nome) ?></h3>
    	</div>
    	<div class="large-2 large-offset-3 columns end">
    		 <?= $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id], ['class'=>'button round small']) ?>
    	</div>
    </div>
    <table class="vertical-table">
        <tr>
            <th><?= __('Referência') ?></th>
            <td><?= h($produto->referencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Preço de Custo') ?></th>
            <td><?= $this->Number->currency($produto->custo_bruto) ?></td>
        </tr>
        <tr>
            <th><?= __('Preço de Venda') ?></th>
            <td><?= $this->Number->currency($produto->preco) ?></td>
        </tr>
        <tr>
            <th><?= __('Fornecedor') ?></th>
            <td><?= $produto->has('fornecedor') ? $this->Html->link($produto->fornecedor->nome, ['controller' => 'Fornecedores', 'action' => 'view', $produto->fornecedor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Marca') ?></th>
            <td><?= h($produto->marca) ?></td>
        </tr>
        <tr>
            <th><?= __('Tamanho') ?></th>
            <td><?= $produto->tamanho?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= h($produto->material) ?></td>
        </tr>
        <tr>
            <th><?= __('Cor') ?></th>
            <td><?= h($produto->cor) ?></td>
        </tr>
        <tr>
            <th><?= __('Descrição') ?></th>
            <td><?= h($produto->descricao) ?></td>
        </tr>
        <tr>
            <th><?= __('Em estoque') ?></th>
            <td><?= $produto->em_estoque ? "Sim" : "Não" ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Vendas Relacionadas') ?></h4>
        <?php if (!empty($produto->vendas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Data') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Desconto') ?></th>
                <th><?= __('Forma Pagamento') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->vendas as $vendas): ?>
            <tr>
                <td><?= h($vendas->data) ?></td>
                <td><?= $this->Number->currency($vendas->total) ?></td>
                <td><?= $this->Number->currency($vendas->desconto) ?></td>
                <td><?= h($vendas->forma_pagamento) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendas', 'action' => 'view', $vendas->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
