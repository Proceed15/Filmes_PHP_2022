<?php ob_start(); ?>
<?php 
  require_once('functions.php'); 
  $nome = $_GET['id'];
  $sqlconsulta =  "select * from filmes where id = id";
	
	// executando instrução SQL
	$host = "fdb28.awardspace.net"; 			
	$user = "3779931_wdacrudpw2"; 
	$pass = "H;LH1}{H88FUxd,eX"; 
	$db = "3779931_wdacrudpw2";
	$conexao = mysqlI_connect($host, $user, $pass, $db);
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	$dados=mysqli_fetch_array($resultado);
			
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
        if (isset($_GET['id'])){
                delete($_GET['id']);
                unlink ('imagens/'.$dados['foto']);
        }else{
                die("ERRO: ID não definido.");
        }
        
  }else{
        $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION['type'] = "danger";
        header("Location: index.php");
  }
?>
<?php ob_end_flush(); ?>