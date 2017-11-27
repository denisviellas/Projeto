<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Página de Cálculo</title>
		<style>
			body{background: #c4c4c4; }
			fieldset{
				width:      250px;
				height:     120px;
				margin:     200px 0px 0px 450px;
				padding:    5px 5px 5px 5px;
				border:     2px groove;
			};
		</style>
	</head>
	<body>
		<fieldset>
			<legend>Calculando</legend>
			<form method="post" action="calcula.php"><br>
				valor A:<input type="text" name="valorA"><br>
				valor B:<input type="text" name="valorB"><br>
				<select name="opcao">
					<option>Somar</option>
					<option>Subtrair</option>
					<option>Dividir</option>
					<option>Multiplicar</option>
				</select><br>
				<input type="submit" value="Calcular">
				<input type="reset" value="Limpar">
			</form>
		</fieldset>		
	</body>
</html>