<?php ob_start(); ?>
<?php 
  require_once('functions.php');
  //esse é o edit.php
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
  } else {
        $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION['type'] = "danger";
        header("Location:" . BASEURL . "filme/index.php");
  }
  include(HEADER_TEMPLATE);
  edit();
  
  function CriaData($data){
      $d = new DateTime ($data);
      return $d->format ("Y-m-d");  
  }      
?>


<header>
        <h2>Atualizar filme</h2>
</header>


<form action="edit.php?id=<?php echo $filme['id']; ?>" method="post" enctype="multipart/form-data">
  <hr />
  
  <div class="row">
    <div class="form-group col-md-7">
      <label for="titulo">Título</label>
      <input type="text" maxlength="50" class="form-control" name="filme['titulo']" value="<?php echo $filme['titulo']; ?>">
    </div>
   <div class="form-group col-md-3">
      <label for="diretor">Diretor</label>
      <input type="text" maxlength="40" class="form-control" name="filme['diretor']" value="<?php echo $filme['diretor']; ?>">
    </div>
   <div class="form-group col-md-2">
      <label for="ano">Ano</label>
      <input type="number" class="form-control" name="filme['ano']" value="<?php echo $filme['ano']; ?>">
    </div>
  </div>
  
    <div class="row">
        <?php
            $foto = "";
            if (empty($filme['foto'])){
              $foto = 'SemImagem.png';
            }else{
              $foto = $filme['foto'];
            }
        ?>
      <div class="form-group col-md-4">
        <label for="campo1">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" value="imagens/<?php echo $foto ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="campo3">Pré-visualização:</label>
        <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/<?php echo $foto ?>" alt="Foto do filme">
      </div>
    </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
      <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
    </div>
  </div>
</form>

  


<?php include(FOOTER_TEMPLATE);	?>
<script>
    $(document).ready(() =>{
        $("#foto").change(function () {
            const file = this.files[0];
            if (file) {
              let reader = new FileReader();
              reader.onload = function (event) {
                $("#imgPreview").attr("src", event.target.result);
              };
              reader.readAsDataURL(file);
          
            }
        });
  });
</script>
<?php ob_end_flush(); ?>