<div class='row'>
	<div class='large-6 columns'>
		<div id='parallelogram'></div>
		<div id="trianguloTituloTela">
		<h3 id='tituloTela'> Lista de Vendas</h3>
		</div>	
	</div>
	<div class='large-1 columns end'>
		<select onchange="this.options[this.selectedIndex].value 
						&& (window.location = this.options[this.selectedIndex].value);">
    		<option value=<?=$this->Paginator->generateUrl(['dia'=>'0','page'=>'1']);?>>Dia...</option>
    		<?php 
    		for ($i=1; $i<=31; $i++)
    		{
    			$url_value = $this->Paginator->generateUrl(['dia'=>$i,'page'=>'1']);
    			$selected = $dia == $i ? ' selected':' ';
    			echo "<option value=".$url_value.$selected.">".$i."</option>";
    		}	
    			?>
		</select>
	</div>
	<div class='large-2 columns end'>
		<select onchange="this.options[this.selectedIndex].value 
						&& (window.location = this.options[this.selectedIndex].value);">
    		<option value=<?=$this->Paginator->generateUrl(['mes'=>'0','page'=>'1']);?>>Mês...</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'1','page'=>'1']);?><?=$mes==1?" selected":"";?>>Janeiro</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'2','page'=>'1']);?><?=$mes==2?" selected":"";?>>Fevereiro</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'3','page'=>'1']);?><?=$mes==3?" selected":"";?>>Março</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'4','page'=>'1']);?><?=$mes==4?" selected":"";?>>Abril</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'5','page'=>'1']);?><?=$mes==5?" selected":"";?>>Maio</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'6','page'=>'1']);?><?=$mes==6?" selected":"";?>>Junho</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'7','page'=>'1']);?><?=$mes==7?" selected":"";?>>Julho</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'8','page'=>'1']);?><?=$mes==8?" selected":"";?>>Agosto</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'9','page'=>'1']);?><?=$mes==9?" selected":"";?>>Setembro</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'10','page'=>'1']);?><?=$mes==10?" selected":"";?>>Outubro</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'11','page'=>'1']);?><?=$mes==11?" selected":"";?>>Novembro</option>
		    <option value=<?=$this->Paginator->generateUrl(['mes'=>'12','page'=>'1']);?><?=$mes==12?" selected":""?>>Dezembro</option>
		</select>
	</div>
	<div class='large-1 columns end'>
		<select onchange="this.options[this.selectedIndex].value 
						&& (window.location = this.options[this.selectedIndex].value);">
    		<option value=<?=$this->Paginator->generateUrl(['ano'=>'0','page'=>'1']);?>>Ano...</option>
		    <option value=<?=$this->Paginator->generateUrl(['ano'=>'2016','page'=>'1']);?><?=$ano==2016?" selected":""?>>2016</option>
		    <option value=<?=$this->Paginator->generateUrl(['ano'=>'2017','page'=>'1']);?><?=$ano==2017?" selected":""?>>2017</option>
		    <option value=<?=$this->Paginator->generateUrl(['ano'=>'2018','page'=>'1']);?><?=$ano==2018?" selected":""?>>2018</option>
		    <option value=<?=$this->Paginator->generateUrl(['ano'=>'2019','page'=>'1']);?><?=$ano==2019?" selected":""?>>2019</option>
		    <option value=<?=$this->Paginator->generateUrl(['ano'=>'2020','page'=>'1']);?><?=$ano==2020?" selected":""?>>2020</option>
		    <option value=<?=$this->Paginator->generateUrl(['ano'=>'2021','page'=>'1']);?><?=$ano==2021?" selected":""?>>2021</option>
		</select>
	</div>
</div>
<div class='row'>
	<div class='large-5 large-offset-7'>
		<a onclick='$(this).hide(); $(totalVendas).show();'>Clique para ver o total de vendas</a>
		<h4 id='totalVendas' style="display:none">
			<?= $total ? 'Total vendido:' . $this->Number->currency($total) : ''; ?>
		</h4>
	</div>
</div>

<div class="vendas index large-8 large-offset-2 medium-11 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('cliente_id') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('desconto') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento','Pagamento') ?></th>
                <th><?= $this->Paginator->sort('funcionarios_id', 'Funcionário') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
            <tr>
                <td><?= h($venda->data) ?></td>
                <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
                <td><?= $this->Number->currency($venda->total) ?></td>
                <td><?= $this->Number->currency($venda->desconto) ?></td>
                <td><?= h($venda->forma_pagamento) ?></td>
                <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->nome_login, ['controller' => 'Funcionarios', 'action' => 'view', $venda->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venda->id]) ?>
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
