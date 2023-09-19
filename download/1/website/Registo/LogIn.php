<?php
session_start();

require('../php/conecção.php');

// Obter os valores do formulário
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$senha = mysqli_real_escape_string($conn, $_POST["senha"]);

// Verificar se o User e senha estão corretos
$sql = "SELECT * FROM users WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User e senha corretos
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['nome'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['is_admin'] = $row['is_admin'];
    echo '<script>window.location.href = "../Home.php";</script>';
    exit;
} else {
    // User ou senha incorretos
    echo '<script>alert("Email ou senha incorretos."); window.location.href = "../Login.html";</script>';
}

$conn->close();
?>
