<?php

require_once('../config.php');
require_once(DBAPI);


$filmes = null;
$filme = null;

/**
 *  Listagem de Filmes
 */
function index() {
	global $filmes;
	

  if (!empty($_POST['movies'])){
      $filmes= filter("filmes", "titulo like '%" . $_POST['movies'] . "%'");
  } else {
    $filmes = find_all('filmes');
  }
}


function upload ($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
  try {
      $nomearquivo = basename($arquivo_destino);
      $uploadOK = 1;

      if(isset($_POST["submit"])) {
          $check = getimagesize($nome_temp);
          if($check !== false) { 
              $_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
              $_SESSION['type'] = "info";
              $uploadOK = 1;
          } else {
              $uploadOK = 0;
              throw new Exception("O arquivo não é uma imagem!");
          }
      }
      
      // Check if file already exists
      if (file_exists($arquivo_destino)) {
        $uploadOK = 0;
        throw new Exception("Desculpe, o arquivo já existe!");
      }
      
      // Check file size
      if ($tamanho_arquivo > 5000000) {
        $uploadOK = 0;
        throw new Exception("Desculpe, mas o arquivo é muito grande");
      }
      
      // Allow certain file formats
      if($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg"
      && $tipo_arquivo != "gif" ) {
        $uploadOK = 0;
        throw new Exception("Desculpe, mas só são permitidos arquivo de imagem JPG, JPEG, PNG e GIF!");
      }
      // Check if $uploadOK is set to 0 by an error
      if ($uploadOK == 0) {
        throw new Exception("Desculpe, o arquivo não pode ser enviado!");
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {
          $_SESSION['message'] = "O arquivo ". htmlspecialchars($nomearquivo). " foi armazenado.";
          $_SESSION['type'] = "success";
        
        } else {
          throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
        }
      }
  } catch(Exception $e){
      $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
      $_SESSION['type'] = "danger";
  }
}

function add() {
  
  if (!empty($_POST['filme'])) {
      try {
          $today = new DateTime("now");
          $filme = $_POST['filme'];
          $filme['datacad'] = $today->format("Y-m-d H:i:s");

          if (!empty($_FILES["foto"]["name"])){
            //Upload da foto
              $pasta_destino = "imagens/";
              $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
              $nomearquivo = basename($_FILES["foto"]['name']);
              $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
              $tamanho_arquivo = $_FILES["foto"]["size"];
              $nome_temp = $_FILES["foto"]["tmp_name"];
              $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

              upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

              $filme['foto'] = $nomearquivo;
          }

          $filme['foto'] = $nomearquivo;

          save('filmes', $filme);
          header('Location: index.php');
      } catch (Exception $e) {
          $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
          $_SESSION['type'] = "danger";
      }
  }
}

function edit() {

//$today = new DateTime("now");
// $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
try {
      if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['filme'])) {

          $filme = $_POST['filme'];

        if (!empty($_FILES["foto"]["name"])){

          $pasta_destino = "imagens/";
          $arquivo_destino = $pasta_destino . basename($_FILES["foto"] ["name"]);
          $nomearquivo = basename($_FILES["foto"] ['name']);
          $resolucao_arquivo = getimagesize($_FILES["foto"] ["tmp_name"]);
          $tamanho_arquivo = $_FILES["foto"] ["size"];
          $nome_temp = $_FILES["foto"] ["tmp_name"];
          $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));
  
          upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);
  
          $filme['foto'] = $nomearquivo;
        }

          update('filmes', $id, $filme);
          header('location: index.php');
        } else {

          global $filme;
          $filme = find("filmes", $id);
        } 
      } else {
        header('location: index.php');
      }
    } catch (Exception $e) {
      $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
      $_SESSION['type'] = "danger";
    }
}

function view($id = null) {
  global $filme;
  $filme = find('filmes', $id);
}

function filtro($diretor = null) {
  global $filme;
  $filme = find('filmes', $diretor);
}

function delete($id = null) {
  global $filmes;
  $filmes = remove("filmes", $id);
  header("location: index.php");
}


?>