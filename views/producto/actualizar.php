<?php
	//Instanciar el Producto
	$producto = new Producto();

	//(1) - Verificar si el CODIGO se envio
	if(isset($_GET["codigo"]))
	{
		//Recibir el CODIGO
		$codigo = $_GET["codigo"];

		//Buscar el Producto del CODIGO enviado
		$fila = $producto->buscarById($codigo);

		//Asignar los valores al Producto
		$producto->id = $fila["id"];
		$producto->descripcion = $fila["descripcion"];
		$producto->categoria = $fila["categoria"];
		$producto->precio = $fila["precio"];
	}


	//(2) - Si se hizo clic en GUARDAR
	if(isset($_GET["txtId"]))
	{
		//Recoger los valores
		$producto->id = $_GET["txtId"];
		$producto->descripcion = $_GET["txtDescripcion"];
		$producto->categoria = $_GET["txtCategoria"];
		$producto->precio = $_GET["txtPrecio"];

		$producto->actualizar($producto);

	}


?>
<style>
	th, td{
		text-align: left;
	}
	input{
		background: #FAE3D8;
	}
</style>
<h1>Producto - Editar</h1>
<form>
	<table class="edit">
		<tr>
			<td><label>CODIGO</label></td>
			<td><input type="text" name="txtId" size="5" value="<?php echo $producto->id ?>" readonly></td>
		</tr>
		<tr>
			<td><label>DESCRIPCION</label></td>
			<td><input type="text" name="txtDescripcion" size="50" value="<?php echo $producto->descripcion ?>"></td>
		</tr>
		<tr>
			<td><label>CATEGORIA</label></td>
			<td><input type="text" name="txtCategoria" size="25" value="<?php echo $producto->categoria ?>"></td>
		</tr>
		<tr>
			<td><label>PRECIO</label></td>
			<td><input type="text" name="txtPrecio" size="10" value="<?php echo $producto->precio ?>"></td>
		</tr>
		<tr>
			<td><a class="return" href="../producto">Regresar</a></td>
			<td><input class="save" type="submit" value="Guardar"></td>
		</tr>
	</table>
</form>