<?php ob_start(); ?>
<?php 

    require_once('functions.php'); 

    if (!isset($_SESSION)) session_start();
    if (isset($_GET['id'])){
        try {
            $usuario = find("usuarios", $_GET['id']);
            delete($_GET['id']);
            unlink ("fotos/" . $usuario['foto']);
        } catch (Exception $e) {
            $_SESSION['message'] = "Não foi possível realizar a operação: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
    } 
?>
<?php ob_end_flush(); ?>