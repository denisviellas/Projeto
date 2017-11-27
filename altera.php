<?php
 
require_once 'inicio.php';
 
// resgata os valores do formulário
$nome          = isset($_POST['nome']) ? $_POST['nome'] : null;
$email         = isset($_POST['email']) ? $_POST['email'] : null;
$sexo          = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$dt_nascimento = isset($_POST['dt_nascimento']) ? $_POST['dt_nascimento'] : null;
$id            = isset($_POST['id']) ? $_POST['id'] : null;
 
// validação (bem simples, mais uma vez)
if (empty($nome) || empty($email) || empty($sexo) || empty($dt_nascimento))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($dt_nascimento);
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE USUARIO SET nome = :nome, email = :email, sexo = :sexo, dt_nascimento = :dt_nascimento WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':dt_nascimento', $isoDate);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: listagem.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>