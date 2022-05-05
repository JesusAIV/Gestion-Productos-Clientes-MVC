<?php

	/*
	PASO #2
	ENRUTAR LAS SOLICITUDES
	*/
	
	//Definir constantes
	define("CTRL_DEFAULT","controllers/home.php");

	//Recoger la URL enviada por .htaccess
	$ruta = $_GET["path"];

	//Convertir la URL en un array
	$ruta = explode("/",$ruta);

	//Verificar si el primer elemento contiene texto
	if(strlen($ruta[0])>0)
	{
		$archivo = "controllers/" . $ruta[0] . ".php";
	}
	else
	{
		$archivo = CTRL_DEFAULT;
	}
	
	//Determinar si el segundo elemento existe
	if(isset($ruta[1]))
	{
		$accion = $ruta[1];
	}
	else
	{
		$accion = "";
	}
	
	//Vericando si el ARCHIVO existe
	if(file_exists($archivo)){

		//Asignar el nombre del modelo
		$modelo = $ruta[0];
		//Importando al CONTROLADOR
		require_once $archivo;

	}
	else
	{
		//Asignar el nombre del modelo predeterminado
		$modelo = "home";
		//Importando al CONTROLADOR por default
		require_once CTRL_DEFAULT;
	}

?>