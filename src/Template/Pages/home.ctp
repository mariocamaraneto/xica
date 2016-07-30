<div class='large-8 large-offset-2 columns'>

	<div>
		<h3 >
			<?php 
				use Cake\I18n\Time; 
				if ( Time::now()->hour < 12) echo 'Bom Dia!';
				elseif( Time::now()->hour < 18 )	echo 'Boa Tarde!';
				else echo 'Boa Noite!';
			?>
		</h3>
	</div>
	
	<div>
		<h2 style='text-transform: capitalize'><?php echo $nomeFuncionario;?></h2>
	</div>
	
</div>

<div class='large-8 large-offset-2 columns' style='position:absolute; bottom:0; text-align: center;'>
	<p style='margin:0; font-size: 0.85em;'>Ping Consultoria</p>
	<p style='margin:0; font-size: 0.7em;'>Caso precise de alguma ajuda entre em contato conosco.</p>
	<p style='margin:0; font-size: 0.7em;'>contato@pingconsultoria.com.br</p>
</div>