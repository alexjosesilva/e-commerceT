<?php
	echo doctype('xhtml1-trans');
?>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title> <?php echo $titulo; ?> </title>
	
	<?php 
		$meta = array(
			array('name' => 'robots','content'=>'no-cache'),
			array('name' => 'description','content'=>'Descrição'),
			array('name' => 'keywords','content'=>'frameworks'),
			array('name' => 'robots','content'=>'no-cache'),
			array('name' => 'Content-type','content'=>'text/html;charset=utf-8','type'=>'equiv')
		);
		
		echo meta($meta);
		
		echo link_tag('css/estilo.css');

	?>
	
</head>

<body>



