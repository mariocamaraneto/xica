
<div class="produtos index large-9 medium-8 columns content">
    <h3>Relatório de Pagamentos Relizados</h3>
    <br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
               	<?= ($parametros['dataPagamento']) ? '<th> Data </th>' : ''?>
				<?= ($parametros['fornecedor']) ? '<th> Fornecedor </th>' : ''?>
				<?= ($parametros['forma_pagamento']) ? '<th> Pagamento </th>' : ''?>
				<?= ($parametros['total']) ? '<th> Total </th>' : ''?>
				<?= ($parametros['funcionario']) ? '<th> Funcionario </th>' : ''?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagamentos as $pagamento): ?>
            <tr>
            	<?= ($parametros['dataPagamento']) ? '<td>'.$pagamento->data.'</td>' : '';  ?>
				<?= ($parametros['fornecedor']) ? '<td>'.$pagamento->fornecedor->nome.'</td>' : '';  ?>
				<?= ($parametros['forma_pagamento']) ? '<td>'.$pagamento->forma_pagamento.'</td>' : '';  ?>
				<?= ($parametros['total']) ? '<td>'.$this->Number->currency($pagamento->valor).'</td>' : '';  ?>
				<?= ($parametros['funcionario']) ? '<td>'.$venda->funcionario['nome_login'].'</td>' : '';  ?>
				
				<?php 
					if($parametros['produtos'])
						{
							$vendas_produtos = $pagamento->vendas_produtos;
							foreach ($vendas_produtos as $venda_produto)
							{
								//fecha a linha anterior um inicia uma nova para inserção dos produtos
								echo '</tr> <tr style="background-color:#EAEAEA">';
								echo '<td>'.$venda_produto->produto->marca.'</td>';
								echo '<td>'.$venda_produto->produto->nome.'</td>';
								echo '<td>'.$this->Number->currency($venda_produto->produto->preco).'</td>';
							}
						}
					
				?>
				
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
