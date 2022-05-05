<?php

//Importar la clase Conexion
require_once "Conexion.php";

class Cliente {
	//Propiedades
	var $id;
	var $nombre;
	var $numruc;
	var $direccion;
    var $telefono;

	//Metodos
	//GESTION DE REGISTROS - CRUD
	function buscarById($idBuscar)
	{
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("select * from cliente where id=:id;");
		//Pasar el valor a los parametros
		$snt->bindValue(":id",$idBuscar);
		//Ejecutar la sentencia
		$snt->execute();
		//Recuperar la fila
		$fila = $snt->fetch();
		//Retornar un objeto con sus valores
		return $fila;
	}

	function buscarByNombre($valorBuscar)
	{
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("select * from cliente where nombre like concat('%',:nom,'%');");
		//Pasar el valor a los parametros
		$snt->bindValue(":nom",$valorBuscar);
		//Ejecutar la sentencia
		$snt->execute();
		//Recuperar las filas
		$tabla = $snt->fetchAll();
		//Retornar la tabla
		return $tabla;
	}
	function insertar($objCliente){
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("insert into cliente (nombre, numruc, direccion, telefono) values (:nom,:num,:dir,:tel);");
		//Pasar los valores a los parametros
		$snt->bindValue(":nom",$objCliente->nombre);
		$snt->bindValue(":num",$objCliente->numruc);
		$snt->bindValue(":dir",$objCliente->direccion);
        $snt->bindValue(":tel",$objCliente->telefono);
		//Ejecutar la sentencia
		$estado = $snt->execute();

		//*** RETORNAR EL NUEVO ID ****//
		if($estado)
		{
			//Preparar la sentencia
			$snt = $cnx->prepare("select max(id) as nuevoId from cliente where nombre=:nom;");
			//Pasar los valores a los parametros
			$snt->bindValue(":nom",$objCliente->nombre);
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
	function actualizar($objCliente){
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("update cliente set nombre=:nom, numruc=:num, direccion=:dir, telefono=:tel where id=:id;");
		//Pasar los valores a los parametros
		$snt->bindValue(":nom",$objCliente->nombre);
		$snt->bindValue(":num",$objCliente->numruc);
		$snt->bindValue(":dir",$objCliente->direccion);
        $snt->bindValue(":tel",$objCliente->telefono);
		$snt->bindValue(":id",$objCliente->id);
		//Ejecutar la sentencia
		$estado = $snt->execute();
		//Retornar el estado de la ejecucion
		return $estado;
	}
	function eliminar($idEliminar){
		//Crear la conexion a la BD
		$cnx = Conexion::conectarMySQL();
		//Preparar la sentencia
		$snt = $cnx->prepare("delete from cliente where id=:id;");
		//Pasar el valor a los parametros
		$snt->bindValue(":id",$idEliminar);
		//Ejecutar la sentencia
		$estado = $snt->execute();
		//Retornar el estado de la ejecucion
		return $estado;
	}
}
?>