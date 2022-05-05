<?php

//Importar la clase Conexion
require_once "Conexion.php";

class Producto {
	//Propiedades
	var $id;
	var $descripcion;
	var $categoria;
	var $precio;

	//Metodos
	//GESTION DE REGISTROS - CRUD
	function buscarById($idBuscar)
	{
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("select * from producto where id=:id;");
		//Pasar el valor a los parametros
		$snt->bindValue(":id",$idBuscar);
		//Ejecutar la sentencia
		$snt->execute();
		//Recuperar la fila
		$fila = $snt->fetch();
		//Retornar un objeto con sus valores
		return $fila;
	}

	function buscarByDescripcion($valorBuscar)
	{
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("select * from producto where descripcion like concat('%',:des,'%');");
		//Pasar el valor a los parametros
		$snt->bindValue(":des",$valorBuscar);
		//Ejecutar la sentencia
		$snt->execute();
		//Recuperar las filas
		$tabla = $snt->fetchAll();
		//Retornar la tabla
		return $tabla;
	}
	function insertar($objProducto){
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("insert into producto (descripcion, categoria, precio) values (:des,:cat,:pre);");
		//Pasar los valores a los parametros
		$snt->bindValue(":des",$objProducto->descripcion);
		$snt->bindValue(":cat",$objProducto->categoria);
		$snt->bindValue(":pre",$objProducto->precio);
		//Ejecutar la sentencia
		$estado = $snt->execute();

		//*** RETORNAR EL NUEVO ID ****//
		if($estado)
		{
			//Preparar la sentencia
			$snt = $cnx->prepare("select max(id) as nuevoId from producto where descripcion=:des;");
			//Pasar los valores a los parametros
			$snt->bindValue(":des",$objProducto->descripcion);
			//Ejecutar la sentencia
			$snt->execute();
			//Recuperar la fila
			$fila = $snt->fetch();
			//Leer el nuevo id
			$nuevoId = $fila["nuevoId"];
		}
		else
		{
			$nuevoId = 0;
		}
		//Retornar el nuevo ID
		return $nuevoId;
	}
	function actualizar($objProducto){
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("update producto set descripcion=:des, categoria=:cat, precio=:pre where id=:id;");
		//Pasar los valores a los parametros
		$snt->bindValue(":des",$objProducto->descripcion);
		$snt->bindValue(":cat",$objProducto->categoria);
		$snt->bindValue(":pre",$objProducto->precio);
		$snt->bindValue(":id",$objProducto->id);
		//Ejecutar la sentencia
		$estado = $snt->execute();
		//Retornar el estado de la ejecucion
		return $estado;
	}
	function eliminar($idEliminar){
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("delete from producto where id=:id;");
		//Pasar el valor a los parametros
		$snt->bindValue(":id",$idEliminar);
		//Ejecutar la sentencia
		$estado = $snt->execute();
		//Retornar el estado de la ejecucion
		return $estado;
	}
}
?>