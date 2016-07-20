<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produto->id],
                ['confirm' => __('Tem certeza que deseja deletar "{0}"?', $produto->nome)]
            )
        ?></li>
     </ul>
</nav>
<div class="produtos form large-9 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend><?= __('Edit Produto') ?></legend>
        
        <div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('nome'); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('marca'); ?>
        	</div>
        </div>
        <div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('material'); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('cor'); ?>
        	</div>
        </div>
        <div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('referencia', ['label'=>'Referência']); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('custo_bruto'); ?>
        	</div>
        </div>
        <div class="row">
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('preco', ['label'=>'Preço']); ?>
        	</div>
        	<div class="large-6 columns">    
        		<?php echo $this->Form->input('descricao', ['label'=>'Descrição']); ?>
        	</div>
        </div>
        <div class="row">
        	<div class="large-6 columns">   
        	<?php 
        			$optFornecedores = [];
        			foreach ($fornecedores as $fornecedor)
        			{
        				$optFornecedores[$fornecedor->id] = $fornecedor->nome;
        			}
        			echo $this->Form->select('fornecedor_id', $optFornecedores);
        		?> 
        		<!--<?php echo $this->Form->input('fornecedor_id', ['options' => $fornecedores]); ?> -->
        	</div>
        	<div class="large-6 columns">    
        		<label>Em estoque</label>
        		<?php echo $this->Form->radio('em_estoque',[1=>"Sim", 0=>'Não'],['value'=>$produto->em_estoque]); ?>
        	</div>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
