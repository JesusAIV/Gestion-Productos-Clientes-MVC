<?php

	// *** CONTROLADOR PRODUCTO *** //

	//Definir constantes
	define("VIEW_DEFAULT","views/producto/inicio.php");

	//CABECERA DE PAGINA
	require_once "views/cabecera.php";

	//INCLUIR AL MODELO
	require_once "models/Producto.php";

	//INCLUIR A LA VISTA
	$vista = "views/producto/" . $accion . ".php";

	if ((strlen($accion)>0) && (file_exists($vista)))
	{
		require_once $vista;
	}
	else
	{
		require_once VIEW_DEFAULT;
	}

	//PIE DE PAGINA
	require_once "views/pie.php";

?>