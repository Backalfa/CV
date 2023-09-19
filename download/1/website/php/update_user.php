<?php
require('conecção.php');

// Processa o formulário
$id = $_POST["id"];
$nome = $_POST["nome"];
$telemovel = $_POST["telemovel"];
$email = $_POST["email"];
$motivo = $_POST["motivo"];

// Validação dos dados
// Aqui você pode implementar a validação de dados de acordo com suas necessidades

// Atualiza o registro no banco de dados
$sql = "UPDATE clientes_contato SET nome='$nome', telemovel='$telemovel', email='$email', motivo='$motivo' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  // Redireciona de volta para a página de lista de clientes
  header("Location: ../ContactsEnv.php");
} else {
  echo "Erro ao atualizar registro: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
