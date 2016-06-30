<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientes index large-9 medium-8 columns content">
    
    <div class='row'>
		<div class='medium-5 large-6 columns'>
	   	 <h3 style="display:inline; margin-right:6em;"><?= __('Clientes') ?></h3>
		</div>
		<div class='small-5 medium-4 large-4 columns'>
		    <!-- Pesquisa por nome do cliente  -->
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
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('telefone') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= h($cliente->nome) ?></td>
                <td><?= h($cliente->telefone) ?></td>
                <td><?= h($cliente->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
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
