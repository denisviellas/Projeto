<?php
 
require_once 'inicio.php';
 
// pega os dados do formuário
$nome          = isset($_POST['nome']) ? $_POST['nome'] : null;
$email         = isset($_POST['email']) ? $_POST['email'] : null;
$sexo          = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$dt_nascimento = isset($_POST['dt_nascimento']) ? $_POST['dt_nascimento'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($email) || empty($sexo) || empty($dt_nascimento))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($dt_nascimento);
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO USUARIO(NOME, EMAIL, SEXO, DT_NASCIMENTO) VALUES(:nome, :email, :sexo, :dt_nascimento)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':dt_nascimento', $isoDate);
 
if ($stmt->execute())
{
    header('Location: listagem.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>