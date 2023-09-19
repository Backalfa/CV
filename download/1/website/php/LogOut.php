<?php

session_start(); // inicia a sessão
session_destroy(); // destrói a sessão
header("Location: ../Registo/LogIn.php"); // redireciona para a página de login
exit(); // finaliza a execução do script

?>