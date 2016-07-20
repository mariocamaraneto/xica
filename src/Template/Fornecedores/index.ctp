<nav class="large-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedores index large-9 medium-8 columns content">
    
   	<div class='row'>
		<div class='medium-5 large-6 columns'>
	   		<h3 style="display:inline; margin-right:6em;"><?= __('Fornecedoras') ?></h3>
		</div>
		<div class='medium-8 large-4 columns'>
		    <!-- Pesquisa por nome do fornecedor -->
		    <?php 
		    	echo $this->Form->create(null, ['type'=>'get']);
		    	echo $this->Form->input('search', ['type'=>'text',
		    			'label' => false,
		    			'placeholder' => 'Digite aqui sua pesquisa',
		    	]);
		    ?>
	    </div>
	    <div class='medium-6 large-2 columns'>
		    <?php 
		    	echo $this->Form->button('Pesquisar', ['class'=>'round tiny button']);
		    	echo $this->Form->end();
		    ?>
	    </div>
	</div>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('telefone') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        
        <tbody>
        	<?php  
        		if(!$fornecedores->count()){
        			echo "<tr><td>Nenhum resultado encontrado<td></tr>";
        		}
        	?>
            <?php foreach ($fornecedores as $fornecedor): ?>
            <tr>
                <td><?= h($fornecedor->nome) ?></td>
                <td><?= h($fornecedor->telefone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fornecedor->id]) ?>
                    /
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fornecedor->id]) ?>
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
