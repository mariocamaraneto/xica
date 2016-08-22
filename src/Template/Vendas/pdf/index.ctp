
<div class="produtos index large-9 medium-8 columns content">
    <h3>Relatório de Todas as Vendas</h3>
    <br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
               	<?= ($parametros['data']) ? '<th> Data </th>' : ''?>
				<?= ($parametros['cliente']) ? '<th> Cliente </th>' : ''?>
				<?= ($parametros['forma_pagamento']) ? '<th> Pagamento </th>' : ''?>
				<?= ($parametros['subtotal']) ? '<th> SubTotal </th>' : ''?>
				<?= ($parametros['desconto']) ? '<th> Desconto </th>' : ''?>
				<?= ($parametros['total']) ? '<th> Total </th>' : ''?>
				<?= ($parametros['funcionario']) ? '<th> Funcionario </th>' : ''?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
            <tr>
            	<?= ($parametros['data']) ? '<td>'.$venda->data.'</td>' : '';  ?>
				<?= ($parametros['cliente']) ? '<td>'.$venda->cliente['nome'].'</td>' : '';  ?>
				<?= ($parametros['forma_pagamento']) ? '<td>'.$venda->forma_pagamento.'</td>' : '';  ?>
				<?= ($parametros['subtotal']) ? '<td>'.$this->Number->currency($venda->subtotal).'</td>' : '';  ?>
				<?= ($parametros['desconto']) ? '<td>'.$this->Number->currency($venda->desconto).'</td>' : '';  ?>
				<?= ($parametros['total']) ? '<td>'.$this->Number->currency($venda->total).'</td>' : '';  ?>
				<?= ($parametros['funcionario']) ? '<td>'.$venda->funcionario['nome_login'].'</td>' : '';  ?>
				
				<?php if($parametros['produtos'])
						{
							foreach ($venda->produtos as $produto)
							{
								//fecha a linha anterior um inicia uma nova para inserção dos produtos
								echo '</tr> <tr style="background-color:#EAEAEA">';
								echo '<td><td>';
								echo '<td>'.$produto['marca'].'</td>';
								echo '<td class="produtos">'.$produto['nome'].'</td>';
								echo '<td>'.$this->Number->currency($produto['preco']).'</td>';
							}
						}
					
					?>
				
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
