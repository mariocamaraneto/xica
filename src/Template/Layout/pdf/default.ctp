
<!DOCTYPE html>
<html>
	<head>
	
		<title>Relatório Brecho da Xica</title>
	
	    <style type="text/css">
			body{
			  font:14px Georgia, serif;
			  background-color: #FFF;
			}
			#page-wrap{
			 	 width:600px;
			 	 margin: 0 auto;
			}
			table{
			  	 border-collapse: collapse;
			  	  width: 100%;
			}
			td{
			  	 border-bottom:1px solid #555; 
			  	 padding:10px;
			  	 text-align: center;
			  	 font-size: 1.2em;
			}
			th{
				font-size: 1.4em;
				border-bottom:2px solid #555; 
			}
			h3{
				font-size: 2em;
				text-align: center;
			}
			thead{
			  	 width:100%;
			  	 position:fixed;
			 	 height:109px;
			}
			
		</style>
		
	</head>

	<body>
		<?= $this->Flash->render() ?>
	    <div class="container clearfix">
	        <?= $this->fetch('content') ?>
	    </div>
	        
	</body>
</html>
