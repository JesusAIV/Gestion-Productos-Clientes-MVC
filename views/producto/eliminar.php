<?php
	echo "<h1>Eliminando ...</h1>";
	
	//Instanciar el Producto
	$producto = new Producto();

	if(isset($_GET["codigo"]))
	{
		//Recibir el CODIGO
		$codigo = $_GET["codigo"];

		//Eliminando
		$producto->eliminar($codigo);

		//Redirigiendo
		header("location:../producto");
	}	

?>