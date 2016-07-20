
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
		* {
		  margin:0; padding:0;
		}
		body{
		  font:14px Georgia, serif;
		}
		
		#page-wrap{
		  width:600px;
		  margin: 0 auto;
		}
		
		table{
		   border-collapse: collapse; width: 100%;
		}
		
		td{
		   border:1px solid #ccc; padding:10px;
		       text-align: center;
		   
		}
		
		thead{
		   width:100%;position:fixed;
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
