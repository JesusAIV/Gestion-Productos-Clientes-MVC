<?php
	//Instanciar el Producto
	$cliente = new Cliente();

	//Verificar si se envio los valores
	if(isset($_GET["txtId"]))
	{
		//Recoger los valores en las propiedades del PRODUCTO
		$cliente->id = $_GET["txtId"];
		$cliente->nombre = $_GET["txtNombre"];
		$cliente->numruc = $_GET["txtNumRuc"];
		$cliente->direccion = $_GET["txtDireccion"];
        $cliente->telefono = $_GET["txtTelefono"];

		//Verificar si el ID es 0
		if($cliente->id==0)
		{
			//Crear un nuevo producto ejecutando el metodo INSERTAR
			//enviando un producto y recoger el nuevo ID
			$nuevoId = $cliente->insertar($cliente);

			//El nuevo id se asigna a la propiedad
			$cliente->id = $nuevoId;
		}
	}
	else
	{
		$cliente->id = 0;
		$cliente->nombre = "";
		$cliente->numruc = "";
		$cliente->direccion = "";
        $cliente->telefono = "";

	}

?>
<style>
	th, td{
		text-align: left;
	}
</style>
<div class="agregar" id="ventana">
	<h1>Cliente - Agregar</h1>

	<form>
		<table>
			<tr>
				<td><label>CODIGO</label></td>
				<td><input type="text" name="txtId" size="5" value="<?php echo $cliente->id ?>" readonly></td>
			</tr>
			<tr>
				<td><label>NOMBRE</label></td>
				<td><input type="text" name="txtNombre" size="50" value="<?php echo $cliente->nombre ?>"></td>
			</tr>
			<tr>
				<td><label>NUMERO RUC</label></td>
				<td><input type="text" name="txtNumRuc" size="25" value="<?php echo $cliente->numruc ?>"></td>
			</tr>
			<tr>
				<td><label>DIRECCION</label></td>
				<td><input type="text" name="txtDireccion" size="10" value="<?php echo $cliente->direccion ?>"></td>
			</tr>
			<tr>
				<td><label>TELEFONO</label></td>
				<td><input type="text" name="txtTelefono" size="10" value="<?php echo $cliente->telefono ?>"></td>
			</tr>
			<tr>
				<td><a class="return" href="../cliente">Regresar</a></td>
				<td><input class="save" type="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
</div>

