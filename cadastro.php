<?php
require 'inicio.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Cadastro de Usuário</title>
    </head>
 
    <body>
 
        <h1>Sistema de Cadastro</h1>
 
        <h2>Cadastro de Usuário</h2>
         
        <form action="inserir.php" method="post">
            <label for="nome">Nome: </label>
            <br>
            <input type="text" name="nome" id="nome">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email">
 
            <br><br>
             
            Sexo:
            <br>
            <input type="radio" name="sexo" id="sexo_m" value="m">
            <label for="sexo_m">Masculino </label>
            <input type="radio" name="sexo" id="sexo_f" value="f">
            <label for="sexo_f">Feminino </label>
             
            <br><br>
 
            <label for="dt_nascimento">Data de Nascimento: </label>
            <br>
            <input type="text" name="dt_nascimento" id="dt_nascimento" placeholder="dd/mm/YYYY">
 
            <br><br>
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>
