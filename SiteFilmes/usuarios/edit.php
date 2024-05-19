<?php ob_start(); ?>
<?php
  //esse é o edit.php
  require_once('functions.php');
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
        if ($_SESSION['user'] != "admin") { // Verifica se o usuário é admin
            $_SESISON['message'] = "Você precisa ser administrador para acessar esse recurso!";
                  $_SESSION['type'] = "danger";
                  header("Location:" . BASEURL . "index.php");
        }
  } else {
          $_SESSION['message'] = "Você precisa estar logado e ser administrador para acessar esse recurso!";
          $_SESSION['type'] = "danger";
          header("Location:" . BASEURL . "index.php");
  }
  view($_GET['id']);
  include(HEADER_TEMPLATE);
  edit();   
?>

<script>
	function validate(){
var a = document.getElementById("password").value;
var b = document.getElementById("confirm_password").value;
  if (a!=b) {
    alert("As senha não coincidem!");
    return false;
  }
}

</script>

		<header>
			<h2>Atualizar Usuário</h2>
		</header>
		
		<form onsubmit = "return validate()" action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data"  >
		  <!-- area de campos do form -->
		  <hr>
		    <div class="row">
				<div class="form-group col-md-8">
					<label for="name">Nome</label>
					<input type="text" class="form-control" name="usuario[nome]" value="<?php echo $usuario['nome']; ?>">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="campo2">Usuário (Login)</label>
					<input type="text" class="form-control" name="usuario[user]" value="<?php echo $usuario['user']; ?>">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-4">
					<label for="campo3">Senha</label>
					<input type="password" class="form-control" id = "password" value="" required>  
				</div>
				<div class="form-group col-md-4">
					<label for="campo4">Confirmar Senha</label>
					<input type="password" class="form-control" id = "confirm_password" name="usuario[password]" value="" required>
				</div>
			</div>
			<div class="row">
				
			</div>
      
			<div class="row">
				<?php
					$foto = "";
					if (empty($usuario['foto'])) {
						$foto = "SemImagem.png";
					} else {
						$foto = $usuario['foto'];
					}
				?>
				<div class="form-group col-md-4">
					<label for="campo1">Foto</label>
					<input type="file" class="form-control" id="foto" name="foto" value="fotos/<?php echo $foto ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="pre">Pré-visualização:</label>
					<img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="fotos/<?php echo $foto ?>" alt="Foto do usuário">
				</div>
			</div>
			
		<div id="actions" class="row">
		  <div class="col-md-12">
			<button type="submit" value = "Submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
			<a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
		  </div>
		</div>
	  </form>
	  
<?php include(FOOTER_TEMPLATE); ?>

<script>
	$(document).ready(() => {
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