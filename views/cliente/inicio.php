<?php
		//Instanciar el Producto
		$cliente = new Cliente();

		//Verificar si se envio el valor de busqueda
		if (isset($_GET["txtValor"]))
		{
			//Recoger el valor a buscar
			$valorBuscar = $_GET["txtValor"];

			$valorBuscar = (strlen($valorBuscar)==0)?null:$valorBuscar;

		}else{
			//Asignar valor por defeault
			$valorBuscar = null;
		}

		//Ejecutar el metodo de busqueda por descripcion
		$tabla = $cliente->buscarByNombre($valorBuscar);
		//Determinar la cantidad de filas de la tabla
		$numFilas = count($tabla);

	?>

	<h1 class="listado">Listado de Clientes</h1>
	<div class="nuevo">
		<a href="cliente/insertar">Nuevo cliente</a>
	</div>
	<hr>
		<form>
			<label>Valor de busqueda:</label>
			<input type="text" name="txtValor">
			<input type="submit" value="Buscar">
		</form>
	<hr>
	<!-- RESULTADO -->
	<table border="1">
		<tr>
			<th>CODIGO</th>
			<th>NOMBRE</th>
			<th>NUMERO RUC</th>
			<th>DIRECCION</th>
            <th>TELEFONO</th>
		</tr>
		<?php
			for($fila=0;$fila<=($numFilas-1);$fila++)
			{
		?>
		<tr>
			<td><?php echo $tabla[$fila]["id"]; ?></td>
			<td><?php echo $tabla[$fila]["nombre"]; ?></td>
			<td><?php echo $tabla[$fila]["numruc"]; ?></td>
			<td><?php echo $tabla[$fila]["direccion"]; ?></td>
            <td><?php echo $tabla[$fila]["telefono"]; ?></td>
			<td><a class="bot" href="cliente/actualizar?codigo=<?php echo $tabla[$fila]['id']; ?>">Editar</a></td>
			<img src="editar.png" alt="">
			<td><a onclick="return eliminar()" class="delete" href="cliente/eliminar?codigo=<?php echo $tabla[$fila]['id']; ?>">Eliminar</a></td>
		</tr>
		<?php
			}
		?>
	</table>