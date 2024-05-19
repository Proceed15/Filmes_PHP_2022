<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" context="IE=edge,chrome=1">
	<title>CRUD com Bootstrap</title>
	<meta name="description" context="Material da aula de PW2">
	<meta name="Keywords" context="HTML, CSS, PHP, bootstrap, aula de pw2">
	<meta name="viewport" context="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo BASEURL; ?>lf_icon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
	<style>
	    body {
		padding-top: 50px;
		padding-bottom: 20px;
	    }
	    .btn-light {
	        color: #FFFFFF;
		background-color: #999999;
		border-color: #999999;
	    }
	    .btn-light:houver {
		color: #FFFFFF;
		background-color: #666666;
		border-color: #666666;
	    }
	    header, #actions {
		margin-top: 10px;
	    }
            table{
                background:#3210F1;
                border-style: solid;
            }
	</style>
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-xxl navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                        <a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house-chimney"></i> CRUD PW2 - 2ºDS - Filmes</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-users"></i> Clientes
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i> Adicionar Cliente</a></li>
                                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/"><i class="fa-solid fa-users"></i> Visualizar Clientes</a></li>
                                                </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-video"></i> Filmes
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>filme/add.php"><i class="fa-solid fa-video"></i> Adicionar Filme</a></li>
                                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>filme/"><i class="fa-solid fa-film"></i> Visualizar Filmes</a></li>
                                                </ul>
                                        </li>
                                        <?php if (isset($_SESSION['user'])) : ?> <!-- //Verifica se está logado -->
                                        <?php if ($_SESSION['user'] == "admin") : ?> <!-- //Verifica se está logado como admin -->
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-user-lock"></i> Usuários
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid fa-user-tie"></i> Adicionar Usuário</a></li>
                                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/"><i class="fa-solid fa-user-lock"></i> Visualizar Usuários</a></li>
                                                </ul>
                                        </li>
                                        <?php endif; ?>
                                        <li class="nav-item">
                                                <a class="nav-link" href="<?php echo BASEURL; ?>inc/logout.php">
                                                        Bem vindo, <?php echo $_SESSION['user']?>! <i class="fa-solid fa-person-walking-arrow-right"></i> Desconectar
                                                </a>
                                        </li>
                                        <?php else : ?>
                                        <li class="nav-item">
                                                <a class="nav-link" href="<?php echo BASEURL; ?>inc/login.php">
                                                        <i class="fa-solid fa-users"></i> Login
                                                </a>
                                        </li>
                                        <?php endif; ?>
                                </ul>
                        </div>
                </div>
        </nav>

	<main class="container">