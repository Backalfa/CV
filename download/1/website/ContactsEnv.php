<?php
session_start(); // Iniciar a sessão

// Para saber se está logado
if (!isset($_SESSION['user_email'])) {
    // User não está logado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}else{
    echo '<script>console.log("Bem vindo, '. $_SESSION['user_email'] . '!")</script>';
    echo '<script>console.log("O user id é '. $_SESSION['user_id'] . ' portanto é admin!")</script>';
}

?>
<?php
if(isset($_POST['enviado'])) {
    header("Location: Contacts.php");
    exit;
}
?>

<html lang="pt">
    <head>
        <title>Caso Prático - Final</title>
        <meta charset="UTF-8" />
        <meta name="author" content="Miguel Sá" />
        <link rel="website icon" type="png" href="imagens/1804352.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/csscontact.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://kit.fontawesome.com/d132031da6.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css" />
        <script src="js/script_contacto.js"></script>
        <script src="js/script_maps.js"></script>
        <script type="text/JavaScript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ4UYojA3LduldgOlizCQJjjpNCjHkvn4&callback=myMap"></script>
        <style>
            @font-face {
                font-family: myfont;
                src: url(fonts/GrindAndDeathDemo.ttf);
            }
            @font-face {
                font-family: myfonte;
                src: url(fonts/Neoradical.ttf);
            }
            @font-face {
                font-family: fontmain;
                src: url(fonts/Righteous-Regular.ttf);
            }
            @font-face {
                font-family: mifont;
                src: url(fonts/WrongFreeTrial.otf);
            }
            @font-face {
                font-family: fontnav;
                src: url(fonts/Poppins-Bold.ttf);
            }
        </style>
    </head>
    <body onload="carregarmapa()">
        <div class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse navtop" id="navbarNavDropdown">
                        <ul class="gap navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="Home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Contacts.php">Contacts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Estimativa de Custo.php">Budget</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmLogout()">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg p-4">
                        <ul class="gap navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="Home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Contacts.php">Contacts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Estimativa de Custo.php">Estimativa de Custo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="confirmLogout()">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav class="bg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </nav>
        </div>
        <header></header>
        <article style="font-family: fontmain;">
        <div class="row top150">
            <div id="header_admin" class="">
                <div class="container"  style="width: 100%;min-height:510px ;background-image: url('imagens/2448.png');background-repeat: no-repeat;background-position: center left;padding: 5px;">
                    <div class="row">
                        <div class="col-sm-5">
                            <div>
                                <h1 style="text-align: right;font-family: fontmain;font-size: 80px;text-transform: uppercase;font-weight: bold;color: #B989F9;">Contacts</h1>
                            </div>
                        </div>
                        <!------------ PARA DETERMINAR AS MENSAGENS ENVIADAS ------------>
                        <?php
                            echo '<div id="content_value_admin" class="col-sm-7" align="center">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telemovel</th>
                                        <th>Email</th>
                                        <th>Data Máxima</th>
                                        <th>Motivo</th>
                                        <th>Enviado</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>';

                                require('php/conecção.php');

                                // Obter o email do user logado
                                $email = $_SESSION['user_email'];

                                // Selecionar as mensagens enviadas pelo email do user logado
                                $sql = "SELECT * FROM clientes_contato WHERE email = '$email'";
                                $result = $conn->query($sql);

                                // Exibir as mensagens
                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nome"] . " " . $row["apelido"] . "</td>";
                                    echo "<td>" . $row["telemovel"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["data"] . "</td>";
                                    echo "<td>" . $row["motivo"] . "</td>";
                                    echo "<td>" . $row["data_local"] . "</td>";
                                    $now = time(); // Obter a data atual em segundos
                                    $data_local = strtotime($row["data_local"]); // Converter a data de envio em segundos
                                    if (($now - $data_local) < 259200) { // Verificar se a diferença é menor que 72 horas (259200 segundos)
                                    echo '<td><button type="button" class="btn btn-primary btn-sm" onclick="editRecord(' . $row["id"] . ')">Editar</button> <button type="button" class="btn btn-danger btn-sm" onclick="deleteRecord(' . $row["id"] . ')">Excluir</button></td>';
                                    } else {
                                    echo '<td>Não é possível editar este registro.</td>';
                                    }
                                    echo "</tr>";
                                }
                                } else {
                                echo "<tr><td colspan='5'>Nenhum resultado encontrado.</td></tr>";
                                }

                                // Fecha a conexão com o banco de dados
                                $conn->close();
                                echo '
                                <tr>
                                <td colspan="2" align="center">
                                    <form method="POST">
                                    <button type="submit" class="read top25" style="color: black; width:auto" name="enviado">Voltar</button>
                                    </form>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                </div>

                                <script>
                                function editRecord(id) {
                                // Redireciona para a página de edição do registro com o ID especificado
                                window.location.href = "php/edit_user.php?id=" + id;
                                }
                                  
                                  function deleteRecord(id) {
                                    // Exibe uma caixa de diálogo de confirmação antes de excluir o registro
                                    if (confirm("Tem certeza que deseja excluir este registro?")) {
                                      // Redireciona para o arquivo que processa a exclusão do registro
                                      window.location.href = "php/delete.php?id=" + id;
                                    }
                                  }
                                  </script>
                                  ';
                            ?>
                    </div>
                </div>
            </div>
        </div>
            <!------------ GEO ------------>
            <div align="left" class="top25 margin_left_25">
                <input id="direccao" type="textbox" value="Lisboa" />
                <input type="button" value="Geolocalizar" onclick="geo()" />
                <br />
                <br />
                <br />
                <div id="mapa" style="width: 300px; height: 175px;"></div>
            </div>
        </article>
        <footer>
            <nav class="FooterMenu">
                <a href="#">Help</a>
                <a href="#">Returns</a>
                <a href="#">Credits</a>
                <a href="#">Term of Use</a>
                <a href="#">Privacy Policy</a>
            </nav>
        </footer>
        <script>
            function validar() {
                var erroDiv = document.getElementById("erro");
                erroDiv.style.display = "none"; // esconder a mensagem de erro inicialmente

                var nome = document.getElementsByName("nome")[0].value;
                var apelido = document.getElementsByName("apelido")[0].value;
                var telemovel = document.getElementsByName("telemovel")[0].value;
                var email = document.getElementsByName("email")[0].value;
                var datatime = document.getElementsByName("datetime")[0].value;
                var motivo = document.getElementsByName("motivo")[0].value;

                if (nome === "" || apelido === "" || telemovel === "" || email === "" || datatime === "" || motivo === "") {
                    erroDiv.innerHTML = "Todos os campos são obrigatórios.";
                    erroDiv.style.display = "block"; // exibir a mensagem de erro
                    return false; // impedir o envio do formulário
                }
                return true; // permitir o envio do formulário
            }
        </script>
        <script>
            const motivos = document.querySelectorAll("td:nth-child(5)");
            
            motivos.forEach(motivo => {
                if (motivo.textContent === '2') {
                    motivo.textContent = 'Orçamento';
                }else if(motivo.textContent === '3') {
                    motivo.textContent = 'Dúvidas';
                }else if (motivo.textContent === '4') {
                    motivo.textContent = 'Outros';
                }
                });
        </script>
        <script>
            function confirmLogout() {
                if (confirm("Você tem certeza que deseja sair?")) {
                    window.location.href = "php/LogOut.php";
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
