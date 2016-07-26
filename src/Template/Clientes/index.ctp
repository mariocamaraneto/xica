<div class='row'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Clientes</h3>
		</div>	
</div>

<div class="clientes index large-8 large-offset-2 medium-10 medium-offset-1 columns">

	<div class='row'>

		<div class='small-5 medium-4 large-5  large-offset-5 columns'>
			<!-- Pesquisa por nome do cliente  -->
		    <?php
						echo $this->Form->create ( null, [ 
								'type' => 'get' 
						] );
						echo $this->Form->input ( 'search', [ 
								'type' => 'text',
								'label' => false,
								'placeholder' => 'Digite aqui sua pesquisa' 
						] );
						?>
	    </div>
		<div class=' medium-4 large-2 columns'>
		    <?php
						echo $this->Form->button ( 'Pesquisar' , ['class'=>'button round tiny']);
						echo $this->Form->end ();
						?>
	    </div>
	</div>


	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('nome') ?></th>
				<th><?= $this->Paginator->sort('telefone') ?></th>
				<th>Num Roupa/Sapato</th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
				<td><?= h($cliente->nome) ?></td>
				<td><?= h($cliente->telefone) ?></td>
				<td><?= h($cliente->num_roupa) ?> / <?= h($cliente->num_sapato) ?> </td>
				<td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id])?>
                    /
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id])?>
                </td>
			</tr>
            <?php endforeach; ?>
        </tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous'))?>
            <?= $this->Paginator->numbers()?>
            <?= $this->Paginator->next(__('next') . ' >')?>
        </ul>
	</div>
</div>
