<?php

	class Conexion
	{
		//Propiedades
		//Metodos
		public static function conectarMySQL()
		{
			//CONEXION A BD DE MYSQL
			//Inicializar las variables para la conexion
			$cadena = "mysql:host=127.0.0.1;dbname=dbVenta303";
			$usuario = "root";
			$clave = "";

			//Instanciar un objeto PDO
			$conexion = new PDO($cadena,$usuario,$clave);

			//Retornar la conexion
			return $conexion;

		}
}

?>