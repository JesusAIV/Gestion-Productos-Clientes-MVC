<?php
	//Instanciar el Producto
	$producto = new Producto();

	//Verificar si se envio los valores
	if(isset($_GET["txtId"]))
	{
		//Recoger los valores en las propiedades del PRODUCTO
		$producto->id = $_GET["txtId"];
		$producto->descripcion = $_GET["txtDescripcion"];
		$producto->categoria = $_GET["txtCategoria"];
		$producto->precio = $_GET["txtPrecio"];

		//Verificar si el ID es 0
		if($producto->id==0)
		{
			//Crear un nuevo producto ejecutando el metodo INSERTAR
			//enviando un producto y recoger el nuevo ID
			$nuevoId = $producto->insertar($producto);

			//El nuevo id se asigna a la propiedad
			$producto->id = $nuevoId;
		}
	}
	else
	{
		$producto->id = 0;
		$producto->descripcion = "";
		$producto->categoria = "";
		$producto->precio = 0;

	}

?>
<style>
	th, td{
		text-align: left;
	}
</style>
<div class="agregar" id=ventana>
	<h1>Producto - Agregar</h1>

	<form>
		<table>
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
</div>
