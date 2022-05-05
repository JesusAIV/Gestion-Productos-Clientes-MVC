<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link type="text/css" rel="stylesheet" href="css/estilos.css">
	<title>MENU <?php echo "- ".$modelo ?></title>
	<script type="text/javascript">
		function eliminar(){
			var respuesta = confirm("Seguro que deseas eliminar");

			if(respuesta == true){
				return true;
			}else{
				return false;
			}
		}
	</script>
	<style>
		*{
			padding: 0;
			margin: 0;
			text-decoration: none;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		.menu{
			background: #1CE1BB;
			padding: 20px;
			text-align: center;
		}
		.container{
			background: #FFF77A;
			padding: 20px;
			text-align: center;
		}
		.gestion{
			margin: 0 90px;
		}
		a:visited{
			color: #485356;
		}
		a:hover{
			color: #323F42;
		}
		.listado{
			text-align: center;
			background: #D54666;
			padding: 15px;
		}
		.nuevo{
			margin: 20px;
		}
		.nuevo>a{
			padding: 10px;
			background: #1CE1BB;
			border-radius: 20px;
			float: right;
		}
		input{
			background: #32B99B;
			padding: 10px;
			outline: none;
			border-radius: 20px;
			border: none;
		}
		.return{
			padding: 10px;
			background: #EDE396;
			border-radius: 20px;
		}
		hr{
			margin: 9px;
			border-color: #1CE1BB;
		}
		label{
			margin: 10px;
		}
		table{
			width: 100%;
		}
		table, tr, td, th{
			background: #DFF6F1;
			border: 0px;
			text-align: center;
		}
		th, td{
			padding: 10px;
		}
		table>tr>th{
			padding: 10px;
		}
		.bot{
			color: black;
			padding: 5px 12px;
			background: #96C7ED;
			border-radius: 10px;
		}
		.delete{
			color: black;
			padding: 5px 12px;
			background: #ED9696;
			border-radius: 10px;
		}
		.edit>tr{
			margin: 0;
			padding: 0;
		}
		.save{
			background: #678AE3;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1 class="menu">Menu Principal</h1>
	<div class="container">
		<a class="gestion" href="producto">Gestionar Productos</a>
		<a class="gestion" href="cliente">Gestionar Clientes</a>
	</div>