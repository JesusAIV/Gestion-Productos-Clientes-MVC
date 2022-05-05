<?php
	//Instanciar el Producto
	$cliente = new Cliente();

	//(1) - Verificar si el CODIGO se envio
	if(isset($_GET["codigo"]))
	{
		//Recibir el CODIGO
		$codigo = $_GET["codigo"];

		//Buscar el Producto del CODIGO enviado
		$fila = $cliente->buscarById($codigo);

		//Asignar los valores al Producto
		$cliente->id = $fila["id"];
		$cliente->nombre = $fila["nombre"];
		$cliente->numruc = $fila["numruc"];
		$cliente->direccion = $fila["direccion"];
        $cliente->telefono = $fila["telefono"];
	}


	//(2) - Si se hizo clic en GUARDAR
	if(isset($_GET["txtId"]))
	{
		//Recoger los valores
		$cliente->id = $_GET["txtId"];
		$cliente->nombre = $_GET["txtDescripcion"];
		$cliente->numruc = $_GET["txtCategoria"];
		$cliente->direccion = $_GET["txtPrecio"];
        $cliente->telefono = $_GET["txtTelefono"];

		$cliente->actualizar($cliente);

	}


?>
<style>
	th, td{
		text-align: left;
	}
	input{
		background: #F5BCBC;
	}
</style>
<h1>Cliente - Editar</h1>
<form>
	<table>
		<tr>
			<td><label>CODIGO</label></td>
			<td><input type="text" name="txtId" size="5" value="<?php echo $cliente->id ?>" readonly></td>
		</tr>
		<tr>
			<td><label>NOMBRE</label></td>
			<td><input type="text" name="txtDescripcion" size="50" value="<?php echo $cliente->nombre ?>"></td>
		</tr>
		<tr>
			<td><label>NUMERO RUC</label></td>
			<td><input type="text" name="txtCategoria" size="25" value="<?php echo $cliente->numruc ?>"></td>
		</tr>
		<tr>
			<td><label>DIRECCION</label></td>
			<td><input type="text" name="txtPrecio" size="10" value="<?php echo $cliente->direccion ?>"></td>
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