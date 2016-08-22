<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Fornecedoras</h3>
		</div>	
</div>

<div class="fornecedores index large-8 large-offset-2 medium-10 medium-offset-1 columns">
    
   	<div class='row'>
		<div class='medium-8 large-5 large-offset-5 columns'>
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
    </div>
</div>
