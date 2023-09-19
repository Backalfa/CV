<?php
session_start();

$email = $_SESSION['user_email'];

if (!isset($_SESSION['user_email'])) {
    // Usuário não está logado, redirecionar para a página de login
    header("Location: login.php");
    exit();
} else if (!isset($_SESSION['alert_displayed'])) {
    echo '<script>alert("Bem vindo, '. $email . '!")</script>';
    $_SESSION['alert_displayed'] = true;
}

// Aqui você pode continuar com o código da sua página
?>

<!DOCTYPE html>  
<html lang="pt">  
    <head>
        <title>Caso Prático - Final</title>
        <meta charset="UTF-8">
        <meta name="author" content="Miguel Sá">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="website icon" type="png" href="imagens/1804352.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/d132031da6.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/csshome.css">
        <link rel="stylesheet" href="css/gallery.css">
        <script src="js/script_read_home.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <div class="row top150">
            <div class="" id="content_value">
            </div>
            <div id="header" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="titulo">
                                <h1 class="titulo1">Web</h1>
                                <h1 class="titulo1">Design</h1>
                                <h2 class="titulo2">Miguel Sá</h2>
                                <div><input type="button" value="READ" class="read top25" id="read" onclick="createInterface()"></div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <img src="imagens/backgroundbodyhome.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article id="article">
            <div id="servicos">
                <div class="container">
                    <div class="row">
                        <div class="titleservice">
                            <h2>Serviços</h2>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 boxservice">
                            <h3 class="servicetitle">Criação da Página</h3>
                            <img src="imagens/responsive_web_design_15.jpg">
                            <div class="button_read_service"><input type="button" value="Infos" class="serviceRead" onclick="service1()"></div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 boxservice">
                            <h3 class="servicetitle">Melhoria da Página</h3>
                            <img src="imagens/awdwad12.png">
                            <div class="button_read_service"><input type="button" value="Infos" class="serviceRead" onclick="service2()"></div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 boxservice">
                            <h3 class="servicetitle">Resolução de Bugs</h3>
                            <img src="imagens/20943839.jpg">
                            <div class="button_read_service"><input type="button" value="Infos" class="serviceRead" onclick="service3()"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="exemplos">
                <div class="container">
                    <div class="titleservice">
                        <h2>Exemplos</h2>
                    </div>
                    <div class="gallery">
                        <div class="gallery__prev"></div>
                        <div class="gallery__next"></div>
                        <div class="gallery__stream" id="back0">
                            <div class="gallery__item bg-1"><input type="button" value="READ" class="botgallery" id="galery1"></div>
                            <div class="gallery__item bg-2"><input type="button" value="READ" class="botgallery" id="galery2"></div>
                            <div class="gallery__item bg-3"><input type="button" value="READ" class="botgallery" id="galery3"></div>
                            <div class="gallery__item bg-4"><input type="button" value="READ" class="botgallery" id="galery4"></div>
                            <div class="gallery__item bg-5"><input type="button" value="READ" class="botgallery" id="galery5"></div>
                            <div class="gallery__item bg-6"><input type="button" value="READ" class="botgallery" id="galery6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <footer id="xfooter" style="margin-top:500px;">
            <nav class="FooterMenu">
                <a href="#">Help</a>
                <a href="#">Returns</a>
                <a href="#">Credits</a>
                <a href="#">Term of Use</a>
                <a href="#">Privacy Policy</a>
            </nav>
        </footer>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stream = document.querySelector('.gallery__stream');
            var items = document.querySelectorAll('.gallery__item');
            
            var prev = document.querySelector('.gallery__prev');
            prev.addEventListener('click', function() {
                stream.insertBefore(items[items.length - 1], items[0]);
                items = document.querySelectorAll('.gallery__item');
            });
            
            var next = document.querySelector('.gallery__next');
            next.addEventListener('click', function() {
                stream.appendChild(items[0]);
                items = document.querySelectorAll('.gallery__item');
            });
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