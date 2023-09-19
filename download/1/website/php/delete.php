<?php
require('conecção.php');

// Prepara a instrução SQL DELETE
$sql = "DELETE FROM clientes_contato WHERE id = $id";

// Executa a instrução SQL DELETE
if ($conn->query($sql) === TRUE) {
  // Redireciona o usuário de volta para a página onde a tabela é exibida
  header("Location: ../Contacts.php");
  exit;
} else {
  echo "Erro ao excluir registro: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
