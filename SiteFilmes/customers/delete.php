<?php ob_start(); ?>
<?php 
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
          require_once('functions.php');

          if (isset($_GET['id'])){
            delete($_GET['id']);
          } else {
            die("ERRO: ID não definido.");
          }
          
  } else {
        $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION['type'] = "danger";
        header("Location: index.php");
  }
?>
<?php ob_end_flush(); ?>