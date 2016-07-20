<nav class="large-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Relatóriode Todos Produtos'), ['controller' => 'Produtos', 'action' => 'index.pdf']) ?></li>
    </ul>
</nav>
<div class="produtos index large-9 medium-8 columns content">
	<div class='row'>
		<div class='medium-5 large-6 columns'>
	   	 <h3 style="display:inline; margin-right:6em;"><?= __('Produtos') ?></h3>
		</div>
		<div class='small-5 medium-4 large-4 columns'>
		    <!-- Pesquisa por [nome, marca, descrição, ...] do produto  -->
		    <?php 
		    	echo $this->Form->create(null, ['type'=>'get']);
		    	echo $this->Form->input('search', ['type'=>'text',
		    			'label' => false,
		    			'placeholder' => 'Digite aqui sua pesquisa',
		    	]);
		    ?>
	    </div>
	    <div class=' medium-4 large-2 columns botao-pesquisar'>
		    <?php 
		    	echo $this->Form->button('Pesquisar');
		    	echo $this->Form->end();
		    ?>
	    </div>
	</div>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('referencia', ['label'=>'Referência']) ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('preco', ['label'=>'Preço']) ?></th>
                <th><?= $this->Paginator->sort('em_estoque') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
            	<td><?= h($produto->referencia) ?></td>
                <td><?= h($produto->nome) ?></td>
                <td><?= $this->Number->currency($produto->preco) ?></td>
                <td><?= $produto->em_estoque ? "Sim" : "Não" ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produto->id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
