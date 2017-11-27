<!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<title>Resultado do Calculo</title>
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
				<?php
					$valorA = $_POST["valorA"];
					$valorB = $_POST["valorB"];
					$opcao = $_POST["opcao"];
					if($opcao == "Somar") {
					  $resultado = $valorA + $valorB;
					}
					if($opcao == "Substrair") {
					  $resultado = $valorA - $valorB;
					}
					if($opcao == "Dividir") {
					  $resultado = $valorA / $valorB;
					}
					if($opcao == "Multiplicar") {
					  $resultado = $valorA * $valorB;
					}
					
					echo'
					<form method="post" action="index.php"><br>
						RESULTADO:<input type="text" style="border:none;" value="'. $resultado .'" readonly><br>
						<input type="submit" value="Voltar">
					</form>
					';
				?>
	</fieldset>
	</body>
</html>	