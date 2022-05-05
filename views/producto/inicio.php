	<?php
		//Instanciar el Producto
		$producto = new Producto();

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
		$tabla = $producto->buscarByDescripcion($valorBuscar);
		//Determinar la cantidad de filas de la tabla
		$numFilas = count($tabla);

	?>

	<h1 class="listado">Listado de Productos</h1>
	<div class="nuevo">
		<a href="producto/insertar">Nuevo producto</a>
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
			<th>DESCRIPCION</th>
			<th>CATEGORIA</th>
			<th>PRECIO S/.</th>
		</tr>
		<?php
			for($fila=0;$fila<=($numFilas-1);$fila++)
			{
		?>
		<tr>
			<td><?php echo $tabla[$fila]["id"]; ?></td>
			<td><?php echo $tabla[$fila]["descripcion"]; ?></td>
			<td><?php echo $tabla[$fila]["categoria"]; ?></td>
			<td><?php echo $tabla[$fila]["precio"]; ?></td>
			<td><a class="bot" href="producto/actualizar?codigo=<?php echo $tabla[$fila]['id']; ?>">Editar</a></td>
			<td><a onclick="return eliminar()" class="delete" href="producto/eliminar?codigo=<?php echo $tabla[$fila]['id']; ?>">Eliminar</a></td>
		</tr>
		<?php
			}
		?>
	</table>