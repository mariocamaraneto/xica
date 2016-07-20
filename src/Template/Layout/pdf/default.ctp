
<!DOCTYPE html>
<html>
	<head>
	    <style type="text/css">
	
			body{
			  font:14px Georgia, serif;
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
			  	 border-top:1px solid #ccc; 
			  	 border-bottom:1px solid #ccc; 
			  	 padding:10px;
			  	 text-align: center;
			   
			}
			
			th{
				font-size: 1.2em;
				
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
