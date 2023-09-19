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
    header("Location: ContactsEnv.php");
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
                        <!------------ PARA DETERMINAR O DISPLAY A SEGUIR CASO SEJA ADMIN OU NÃO ------------>
                            <?php
                                // Para saber se é admin
                                if ($_SESSION['user_id'] == 1) {
                                    // User é admin
                                    echo '<div id="content_value_admin" class="col-sm-7" align="center">
                                    <table>
                                      <thead>
                                        <tr>
                                          <th>Nome</th>
                                          <th>Telemovel</th>
                                          <th>Email</th>
                                          <th>Motivo</th>
                                          <th>Ações</th>
                                        </tr>
                                      </thead>
                                      <tbody>';

                                        // Configuração da conexão com o banco de dados
                                        require('php/conecção.php');
                                  
                                        // Query para buscar os dados da tabela
                                        $sql = "SELECT id, nome, apelido, telemovel, email, motivo FROM clientes_contato";
                                        $result = $conn->query($sql);
                                  
                                        // Verifica se a query retornou resultados
                                        if ($result->num_rows > 0) {
                                          // Exibe os dados em uma tabela
                                          while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["nome"] ." ". $row["apelido"] . "</td>";
                                            echo "<td>" . $row["telemovel"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["motivo"] . "</td>";
                                            echo '<td><button type="button" class="btn btn-primary btn-sm" onclick="editRecord(' . $row["id"] . ')">Editar</button> <button type="button" class="btn btn-danger btn-sm" onclick="deleteRecord(' . $row["id"] . ')">Excluir</button></td>';
                                            echo "</tr>";
                                          }
                                          
                                        } else {
                                          echo "<tr><td colspan='5'>Nenhum resultado encontrado.</td></tr>";
                                        }
                                  
                                        // Fecha a conexão com o banco de dados
                                        $conn->close();
                                        echo '</tbody>
                                        </table>
                                        </div>
                                  
                                  <script>
                                  function editRecord(id) {
                                    // Redireciona para a página de edição do registro com o ID especificado
                                    window.location.href = "php/edit.php?id=" + id;
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
                                } else {
                                    echo '<div class="col-sm-7 not_admin">
                                    <!------------ CONTACTO ------------>
                                    <table align="center" class="">
                                        <form method="POST" action="php/contacto.php" onsubmit="return validar()">
                                            <tr>
                                                <th colspan="2"><h3 class="center top25 down25">Pedido de Contacto</h3></th>
                                            </tr>
                                            <tr>
                                                <th colspan="2"><h3 class="top25" style="text-align:center">Dados</h3></th>
                                            </tr>
                                            <tr>
                                                <td align="center">Nome:</td>
                                                <td><input type="text" value="" id="nome" name="nome" onchange="validar_nome()" /></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Apelido:</td>
                                                <td><input type="text" value="" id="apelido" name="apelido" onchange="validar_apelido()" /></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Telemovel:</td>
                                                <td><input type="tel" value="" id="telemovel" name="telemovel" onchange="validar_telemovel()" /></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Email:</td>
                                                <td><input type="email" value="'. $_SESSION['user_email'] . '" id="email" name="email" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Data Atual:</td>
                                                <td><input type="date" id="datatime_local" style="width: 100%;" name="datetime_local" disabled /></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Data Máxima:</td>
                                                <td><input type="date" id="datatime" style="width: 100%;" name="datetime" onchange="validar_data()" /></td>
                                            </tr>
                                            <tr>
                                                <td align="center">Motivo:</td>
                                                <td>
                                                        <select id="motivo" style="width: 100%;" name="motivo">
                                                        <option value="1" selected></option>
                                                        <option value="2">Orçamento</option>
                                                        <option value="3">Dúvidas</option>
                                                        <option value="4">Outros...</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <button type="submit" class="read top25" style="color: black;">Submeter</button>
                                                    </td>
                                                </tr>
                                            </form>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <form method="POST">
                                                            <button type="submit" class="read top25" style="color: black; width:auto" name="enviado">Contactos Enviados</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        </table>
                                        <br />
                                        <div style="text-align: center;"><span id="erro" style="display: none; color: red;"></span></div>
                                    </div>';
                                }

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
            const motivos = document.querySelectorAll("td:nth-child(4)");
            
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
        <script>
            // Obtém a data atual
            var hoje = new Date();

            // Formata a data no formato yyyy-mm-dd
            var dia = hoje.getDate();
            var mes = hoje.getMonth() + 1; // Adiciona 1 porque os meses em JavaScript começam em 0 (janeiro)
            var ano = hoje.getFullYear();

            if (dia < 10) {
            dia = '0' + dia; // Adiciona um zero à esquerda para dias menores que 10
            }

            if (mes < 10) {
            mes = '0' + mes; // Adiciona um zero à esquerda para meses menores que 10
            }

            var dataAtual = ano + '-' + mes + '-' + dia;

            // Atribui a data atual ao campo de data
            document.getElementById('datatime_local').value = dataAtual;

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
