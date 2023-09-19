<?php
session_start();

require('conecção.php');

// Obter os valores do formulário
$nome = mysqli_real_escape_string($conn, $_POST["nome"]);
$apelido = mysqli_real_escape_string($conn, $_POST["apelido"]);
$telemovel = mysqli_real_escape_string($conn, $_POST["telemovel"]);
$email = $_SESSION['user_email'];
$datatime = mysqli_real_escape_string($conn, $_POST["datetime"]);
$motivo = mysqli_real_escape_string($conn, $_POST["motivo"]);
$data_local = date("Y-m-d", strtotime("now"));


// Inserir os valores na tabela
$sql = "INSERT INTO clientes_contato (nome, apelido, telemovel, email, data, motivo, data_local)
        VALUES ('$nome', '$apelido', '$telemovel', '$email', '$datatime', '$motivo', '$data_local')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("O seu pedido de contacto foi enviado com sucesso!");</script>';
    echo '<script>window.location.href = "'.$_SERVER['HTTP_REFERER'].'";</script>';
    exit;
} else {
    echo '<script>alert("Tem de preencher todos os campos!");</script>';
}

$conn->close();
?>
