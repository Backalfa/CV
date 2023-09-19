<?php
require('conecção.php');

// Verifica se o ID foi informado como parâmetro na URL
if (!isset($_GET["id"])) {
    header("Location: ../ContactsEnv.php");
  exit();
}

// Busca os dados do registro a ser editado
$id = $_GET["id"];
$sql = "SELECT nome, telemovel, email, motivo FROM clientes_contato WHERE id = $id";
$result = $conn->query($sql);

// Verifica se o registro existe
if ($result->num_rows == 0) {
    header("Location: ../ContactsEnv.php");
  exit();
}

// Extrai os dados do registro para exibir no formulário
$row = $result->fetch_assoc();
$nome = $row["nome"];
$telemovel = $row["telemovel"];
$email = $row["email"];
$motivo = $row["motivo"];

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar registro</title>
</head>
<body>
  <h1>Editar registro</h1>
  <form method="POST" action="update_user.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
    <label>Telemovel:</label>
    <input type="text" name="telemovel" value="<?php echo $telemovel; ?>"><br>
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>"><br>
    <label>Motivo:</label>
    <textarea name="motivo"><?php echo $motivo; ?></textarea><br>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>
