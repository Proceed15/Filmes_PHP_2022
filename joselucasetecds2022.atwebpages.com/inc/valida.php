<?php
ob_start();
?>
<?php
include("../config.php");
require_once(DBAPI);
include(HEADER_TEMPLATE);




if (!empty($_POST) and (empty($_POST['login']) or empty($_POST['senha']))) {
    header("Location:" . BASEURL . "index.php");
    exit;
}
$bd = open_database();

try {
    $bd->select_db(DB_NAME);


    $usuario = $_POST['login'];
    $senha = $_POST['senha'];
   
   
    if (!empty($usuario) && !empty($senha)) {
        $senha = criptografia($_POST['senha']);



       $sql = "SELECT id, nome, user, password FROM usuarios WHERE (user = '" . $usuario . "') AND (password = '" . $senha . "') LIMIT 1";
        $query = $bd->query($sql);
        if ($query->num_rows > 0) {
            $dados = $query->fetch_assoc();
            echo "<b>";
            //var_dump($dados);
            echo "<b>";
            $id = $dados["id"];
            $nome = $dados["nome"];
            $user = $dados["user"];
            $password = $dados["password"];
            //var_dump($user);
        
            if (!empty($user)) {
                if (!isset($_SESSION)) session_start();
                $_SESSION['message'] = "Bem vindo " . $nome . "!";
                $_SESSION['type'] = "info";
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;
                $_SESSION['user'] = $user;
                echo "<b>";
                //var_dump($user);
                echo "<b>";
            
              } else {
                throw new Exception("Não foi possivel se conectar!<br>Verifique seu usuário e senha.");
            }
            header("Location:" . BASEURL . "index.php");
        } else {
            throw new Exception("Não foi possivel se conectar!<br>Verifique seu usuário e senha.");
               }
        } else {
        throw new Exception("Não foi possivel se conectar!<br>Verifique seu usuário e senha.");
    }}
catch (Exception $e) {
    $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
    $_SESSION['type'] = "danger";
}
?>
<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>



   </div>
<?php clear_messages(); ?>
<?php endif; ?>

<header>
    <a href="login.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Voltar </a>
</header>



<?php include(FOOTER_TEMPLATE); ?>
<?php ob_end_flush(); ?>