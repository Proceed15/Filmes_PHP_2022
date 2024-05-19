<?php ob_start(); ?>
<?php

    require_once('../config.php');
    require_once(DBAPI);

    
    $usuario = null;
    $usuarios = null;

/**
 *  Listagem de Clientes
 */
    function index() {
        global $usuarios;
        if (!empty($_POST['users'])){
            $usuarios = filter("usuarios", "nome like '%" . $_POST['users'] . "%'");
        } else {
            $usuarios = find_all('usuarios');
        }
    }

    /*function criptografia($senha){
        $custo = "08";
        $salt = "CflfilePArKlBJomM0F6aJ";
        $hash = crypt($senha, "$2a$" . $custo . "$" . $salt . "$");
        return $hash;
    }*/

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

        if (!empty($_POST['usuario'])) {
            try {
                $usuario = $_POST['usuario'];

                if (!empty($_FILES["foto"]["name"])){
                  //Upload da foto
                    $pasta_destino = "fotos/";
                    $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                    $nomearquivo = basename($_FILES["foto"]['name']);
                    $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                    $tamanho_arquivo = $_FILES["foto"]["size"];
                    $nome_temp = $_FILES["foto"]["tmp_name"];
                    $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

                    upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                    $usuario['foto'] = $nomearquivo;
                }

                if (!empty($usuario['password'])){
                    $senha = criptografia($usuario['password']);
                    $usuario['password'] = $senha;
                }

                $usuario['foto'] = $nomearquivo;

                save('usuarios', $usuario);
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

              if (!empty($_POST['usuario'])) {

                $usuario = $_POST['usuario'];

                if (isset($usuario['password'])){
                    $senha = criptografia($usuario['password']);
                    $usuario['password'] = $senha;
                }

                if (!empty($_FILES["foto"]["name"])){

                  $pasta_destino = "fotos/";
                  $arquivo_destino = $pasta_destino . basename($_FILES["foto"] ["name"]);
                  $nomearquivo = basename($_FILES["foto"] ['name']);
                  $resolucao_arquivo = getimagesize($_FILES["foto"] ["tmp_name"]);
                  $tamanho_arquivo = $_FILES["foto"] ["size"];
                  $nome_temp = $_FILES["foto"] ["tmp_name"];
                  $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));
        
                  upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);
        
                  $usuario['foto'] = $nomearquivo;
                }

                update('usuarios', $id, $usuario);
                header('location: index.php');
              } else {

                global $usuario;
                $usuario = find("usuarios", $id);
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
          global $usuario;
          $usuario = find("usuarios", $id);
      }

      function delete($id = null) {
          global $usuarios;
          $usuarios = remove('usuarios', $id);
          header('location: index.php');
      }
?>
<?php ob_end_flush(); ?>