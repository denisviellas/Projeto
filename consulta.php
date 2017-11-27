<?php
// alterado para comitar

require_once 'inicio.php';
 
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT nome, email, sexo, dt_nascimento FROM usuario WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Edição de Usuário</title>
    </head>
 
    <body>
 
        <h1>Sistema de Cadastro</h1>
 
        <h2>Edição de Usuário</h2>
         
        <form action="editar.php" method="post">
            <label for="nome">Nome: </label>
            <br>
            <input type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>">
 
            <br><br>
 
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
 
            <br><br>
             
            Sexo:
            <br>
            <input type="radio" name="sexo" id="sexo_m" value="m" <?php if ($user['sexo'] == 'm'): ?> checked="checked" <?php endif; ?>>
            <label for="sexo_m">Masculino </label>
            <input type="radio" name="sexo" id="sexo_f" value="f" <?php if ($user['sexo'] == 'f'): ?> checked="checked" <?php endif; ?>>
            <label for="sexo_f">Feminino </label>
             
            <br><br>
 
            <label for="dt_nascimento">Data de Nascimento: </label>
            <br>
            <input type="text" name="dt_nascimento" id="dt_nascimento" placeholder="dd/mm/YYYY" value="<?php echo dateConvert($user['dt_nascimento']) ?>">
 
            <br><br>
 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>