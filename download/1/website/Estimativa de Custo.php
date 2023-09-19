<?php
session_start();

$email = $_SESSION['user_email'];

if (!isset($_SESSION['user_email'])) {
    // Usuário não está logado, redirecionar para a página de login
    header("Location: login.php");
    exit();
}
?>
<html lang="pt">  
    <head>
        <title>Caso Prático - Final</title>
        <meta charset="UTF-8">
        <meta name="author" content="Miguel Sá">
        <link rel="website icon" type="png" href="imagens/1804352.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/d132031da6.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script_custo.js"></script>
        <link rel="stylesheet" href="css/css.budget.css">
        <style>
            @font-face{
                font-family: myfont;
                src: url(fonts/GrindAndDeathDemo.ttf);
            }
            @font-face{
                font-family: myfonte;
                src: url(fonts/Neoradical.ttf);
            }
            @font-face{
                font-family: fontmain;
                src: url(fonts/Righteous-Regular.ttf);
            }
            @font-face{
                font-family: mifont;
                src: url(fonts/WrongFreeTrial.otf);
            }
            @font-face{
                font-family: fontnav;
                src: url(fonts/Poppins-Bold.ttf);
            }
            input:focus{
                outline: none;
                box-shadow: 0 0 3px 1px black;
            }
        </style>
    </head>
    <body>
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
        <article style="font-family:fontmain;">
            <div class="row top150">
                <div class="col-sm-"></div>
                <div class="col-sm-5 container">
                    <div class="srcimg">
                        <h1>Budget</h1>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="grey" id="menupedido">
                        <table align="center">
                            <tr>
                                <th colspan="2"><h3 class="center top25 down25">Pedido de Orçamento</h3></th>
                            </tr>
                            <tr>
                                <td align="center">Tipo de página web:</td>
                                <td>
                                    <select id="paginaweb" onchange="TotalPrice()">
                                        <option value="0" selected></option>
                                        <option value="1100">Reconstrução de Página</option>
                                        <option value="1500">Criação de Página</option>
                                        <option value="900">Melhoria de Página</option>
                                        <option value="800">Resolução de Bugs</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">Prazo em Meses:</td>
                                <td><input type="number" name="meses" id="prazo_meses" onchange="TotalPrice()"></td>
                            </tr>
                            <tr>
                                <th colspan="2"><h3 class="center top25 down25">Marque os Separadores Desejados</h3></th>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="quemsomos" onchange="TotalPrice()"> Quem somos</td>
                                <td><input type="checkbox" id="ondeestamos" onchange="TotalPrice()"> Onde estamos</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="fotos" onchange="TotalPrice()"> Galeria de fotografia</td>
                                <td><input type="checkbox" id="eComerce" onchange="TotalPrice()"> eComerce</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="gestaointerna" onchange="TotalPrice()"> Gestão Interna</td>
                                <td><input type="checkbox" id="noticias" onchange="TotalPrice()"> Notícias</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="redessociais" onchange="TotalPrice()"> Redes Sociais</td>
                            </tr>
                            <tr>
                                <th colspan="2"><h3 class="center top25 down25">Orçamento Estimado</h3></th>
                            </tr>
                            <tr>
                                <td colspan="2"><span>(É um valor meramente indicativo, poderá sofrer alterações, IVA não incluído).</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input class="down25 top25 center" type="text" id="pricebox" value="" disabled>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
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
            function confirmLogout() {
                if (confirm("Você tem certeza que deseja sair?")) {
                    window.location.href = "php/LogOut.php";
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>