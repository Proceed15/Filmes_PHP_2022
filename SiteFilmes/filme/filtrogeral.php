<?php 
	require_once('functions.php'); 
	filtro();
	
	include(HEADER_TEMPLATE);
		function FormataData($data){
      $da = new DateTime ($data);
      return $da->format ("d-m-Y");  
	}
?>
<style>

td,th{
	color: #FFF;
}

 
</style>
<header >
	<div class="row">
		<div class="col-sm-6">
			<h2>filmes</h2>
		</div>
			<div class="col-sm-6 text-end h2" >
				<a class="btn btn-secondary" href="add.php"  ><i class="fa fa-plus"></i> Novo filme</a>
				<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
		
	</div>
</header>
<hr>
<?php 
$sqldiretor =$_POST['movies'];
$sqlordem = "select * from filmes where diretor like '%$sqldiretor%'";
$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$db = "wda_crud";
$conexao = mysqlI_connect($host, $user, $pass, $db);
$resultado = @mysqli_query($conexao, $sqlordem);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} 
	
	else{
echo "<table class='table table-hover'>";
	echo "<thead>
	<tr>
	<tr>
	<th width='30px' >Id</th>
	<th width='150px'>titulo</th>
	<th width='100px'>diretor</th>
	<th width='100px'>Ano</th>
	<th width='150px'>Data de cadastro</th>
	<th width='150px'>Foto</th>
	<th width='150px'>Opções</th>
	<tr>
	</tr>
	</thead>
	<tbody>";			
		while($filmes=mysqli_fetch_array($resultado)) 
		{
		echo "<tr>";
		echo "<td>". $filmes['id']."</td>";
		echo "<td>". $filmes['titulo']."</td>";
		echo "<td>". $filmes['diretor']."</td>";
		echo "<td>". $filmes['ano']."</td>";
		echo "<td>". FormataData($filmes['datacad'])."</td>";		
		// buscando a na pasta imagem
		if (empty($filmes['foto'])){
			$foto = 'SemImagem.png';
		}else{
			$foto = $filmes['foto'];
		}
		$id = base64_encode($filmes['id']);

		echo "<td><a href='verproduto.php?id=$id'><img src='imagens/$foto' width='450px' heigth='50px'></a></td>";
	?>
		
		<td class="actions text-start"> 
			<a href="view.php?id=<?php echo $filmes['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $filmes['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-filme-modal" data-filme="<?php echo $filmes['id']; ?>" >
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
		
		</tr>
	<?php	
		}
	}
	echo "</tbody>";
	echo "</table>";
	
	
?>

<input type='button' onclick="window.location='index.php';" value="Voltar">




<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE);	?>