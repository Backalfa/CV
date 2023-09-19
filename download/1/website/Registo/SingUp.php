<?php
session_start();

require('../php/conecção.php');

// Obter os valores do formulário
$username = $_POST["creausername"];
$email = $_POST["creaemail"];
$password = $_POST["creapass"];

// Verificar se o email já está em uso
$sql_email = "SELECT * FROM users WHERE email='$email'";
$result_email = mysqli_query($conn, $sql_email);

if (mysqli_num_rows($result_email) > 0) {
  // Email já cadastrado, exibir alerta
  echo '<script>alert("O email inserido já está em uso. Por favor, insira outro email."); window.location.href = "../LogIn.html";</script>';
  exit();
}

// Verificar se o nome de usuário já está em uso
$sql_username = "SELECT * FROM users WHERE nome='$username'";
$result_username = mysqli_query($conn, $sql_username);

if (mysqli_num_rows($result_username) > 0) {
  // Nome de usuário já cadastrado, exibir alerta
  echo '<script>alert("O nome de usuário inserido já está em uso. Por favor, insira outro nome de usuário."); window.location.href = "../LogIn.html";</script>';
  exit();
}

// Inserir os valores no banco de dados
$sql = "INSERT INTO users (nome, email, senha) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  // Registro bem-sucedido, exibir alerta
  echo '<script>alert("Registro bem-sucedido!"); window.location.href = "../LogIn.html";</script>';
} else {
  echo "Erro ao registrar: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
