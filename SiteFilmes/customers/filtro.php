<?php 
	require_once('functions.php'); 
	filtro();
	
	include(HEADER_TEMPLATE);
		function FormataData($data){
      $d = new DateTime ($data);
      return $d->format ("d-m-Y");  
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
			<h2>Carros</h2>
		</div>
			<div class="col-sm-6 text-end h2" >
				<a class="btn btn-secondary" href="add.php"  ><i class="fa fa-plus"></i> Novo Carro</a>
				<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
		
	</div>
</header>
<hr>
<?php 
$sqlmarca =$_POST['name'];
$sqlordem = "select * from customers where name like '%$sqlmarca%'";
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
	<th>Id</th>
	<th width='30%'>Nome</th>
	<th>CPF/CNPJ</th>
	<th>Telefone</th>
	<th>Atualizado em</th>
	<th>Data</th>
	<th>Opções</th>
	<tr>
	</tr>
	</thead>
	<tbody>";			
		while($customer=mysqli_fetch_array($resultado)) 
		{
		echo "<tr>";
		echo "<td>". $customer['id']."</td>";
		echo "<td>". $customer['name']."</td>";
		echo "<td>".$customer['cpf_cnpj']."</td>";
		echo "<td>". $customer['phone']."</td>";
		$d = new Datetime($customer['modified']);	
		echo "<td>". $d ->format("d/m/Y")."</td>";
		echo "<td>".$customer['modified']."</td>";
	?>
		
		<td class="actions text-start"> 
			<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-carro="<?php echo $customer['id']; ?>" >
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